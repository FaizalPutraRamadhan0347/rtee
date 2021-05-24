<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnsInPrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('donation_collected');
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->integer('donation_collected')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('donation_collected');
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->integer('donation_collected')->nullable(false);
        });
    }
}
