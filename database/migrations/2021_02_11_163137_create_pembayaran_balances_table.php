<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pembayaran')->constrained('pembayaran');
            $table->foreignId('id_spp')->constrained('spp');
            $table->foreignId('nisn')->constrained('siswa', 'nisn');
            $table->string('balance_code')->unique();
            $table->integer('outstanding');
            $table->boolean('status_balance');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_balances');
    }
}
