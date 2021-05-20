<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBuktiPembayaranInDonationConfirmations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donation_confirmations', function (Blueprint $table) {
            $table->string('bukti_pembayaran', 200)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donation_confirmations', function (Blueprint $table) {
            $table->string('bukti_pembayaran', 200)->nullable(false)->change();
        });
    }
}
