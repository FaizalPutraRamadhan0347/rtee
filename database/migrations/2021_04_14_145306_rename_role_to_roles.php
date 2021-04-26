<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameRoleToRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'user', 'partner')");
        // DB::statement("ALTER TABLE users CHANGE role roles ENUM('admin', 'user', 'partner')");
        
        // Schema::table('users', function (Blueprint $table) {
        //     $table->renameColumn('role', 'roles');
        // });
; 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'user', 'partner') NOT NULL");
        // Schema::table('users', function (Blueprint $table) {
        //     $table->renameColumn('role', 'roles');
        // });
    }
}

