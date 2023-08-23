<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {

        Schema::create('cities', static function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('department_id');
            $table->string('name', 60);
            $table->foreignId('state_id');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('state_id')->references('code')->on('parameters');
            $table->unique(['department_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists('cities');
    }
}
