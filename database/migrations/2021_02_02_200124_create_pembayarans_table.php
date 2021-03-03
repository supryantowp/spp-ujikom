<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_spp')->constrained('spp');
            $table->foreignId('id_user')->constrained('users');
            $table->string('pembayaran_code')->nullable();
            $table->foreignId('nisn')->constrained('siswa', 'nisn')->cascadeOnUpdate();
            $table->bigInteger('jumlah_bayar');
            $table->bigInteger('dibayar');
            $table->bigInteger('sisa_bayar');
            $table->text('catatan')->nullable();
            $table->boolean('status_pembayaran')->default(0);
            $table->boolean('void_pembayaran')->default(0);
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
        Schema::dropIfExists('pembayarans');
    }
}
