<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\PermissionRegistrar;

class UpdateUserTables extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {
        Schema::table('users', static function (Blueprint $table) {

            $table->uuid('uuid')->after('id');
            $table->string('first_names')->after('name');
            $table->string('last_names')->after('first_names');
            $table->string('username')->nullable()->after('last_names');
            $table->string('photo')->nullable()->after('username');
            $table->foreignId('type_document_id')->nullable()->after('photo');
            $table->string('document')->unique()->nullable()->after('type_document_id');
            $table->foreignId('gender_id')->after('document');
            $table->foreignId('state_id')->after('gender_id');
            $table->foreignId('supervisor_id')->nullable()->after('gender_id');;

            $table->foreign('state_id')->references('code')->on('parameters');
            $table->foreign('type_document_id')->references('code')->on('parameters');
            $table->foreign('gender_id')->references('code')->on('parameters');
            $table->foreign('supervisor_id')->references('id')->on('users');

            $table->dropColumn('name');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down(): void {

    }

}
