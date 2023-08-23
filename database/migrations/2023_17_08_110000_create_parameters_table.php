<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParametersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('parameters', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('value_id');
            $table->unsignedBigInteger('code')->unique();
            $table->string('name', 100);
            $table->char('state', 1);
            $table->string('description')->default('Sin def.');
            $table->text('msg')->nullable();
            $table->timestamps();

            $table->foreign('value_id')->references('id')->on('values');
            $table->unique(['value_id', 'code', 'name']);

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('parameters');
    }
}
