<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            return view('rocket::themes.able.layouts.auth.login');
        });

        Fortify::registerView(function () {
            return view('rocket::themes.able.layouts.auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('rocket::themes.able.layouts.auth.password.email');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('rocket::themes.able.layouts.auth.password.reset', ['request' => $request]);
        });

        Fortify::verifyEmailView(function () {
            return view('rocket::themes.able.layouts.auth.verify');
        });

        Fortify::confirmPasswordView(function () {
            return view('rocket::themes.able.layouts.auth.password-confirm');
        });

        Fortify::twoFactorChallengeView(function () {
            return view('rocket::themes.able.layouts.auth.two-factor-challenge');
        });


        RateLimiter::for('login', function (Request $request) {
            Config::set('fortify.username', config('rocket.login.field', 'email'));
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
