<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {
        Schema::create('countries', static function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('abbreviation', 3);
            $table->unsignedBigInteger('state_id');
            $table->timestamps();

            $table->foreign('state_id')
                ->references('code')
                ->on('parameters');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists('countries');
    }
}
