<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->string('name');
            $table->text('value');
            $table->text('domain')->nullable();
            $table->dateTime('expiration_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('type_ches');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void {
        Schema::dropIfExists('ches');
    }
};
