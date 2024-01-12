<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\PermissionRegistrar;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {
        Schema::create('errors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('message');
            $table->text('stack_trace');
            $table->text('url');
            $table->json('input');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down(): void {
        Schema::dropIfExists('errors');
    }

};
