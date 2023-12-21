<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\PermissionRegistrar;

class CreateErrorsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {
        Schema::create('errors', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->text('stack_trace');
            $table->text('url');
            $table->json('input');
            $table->timestamps();
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

}
