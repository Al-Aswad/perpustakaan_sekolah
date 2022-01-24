<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->nullable()
                ->constrained('books')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('pinjam');
            $table->date('kembali');
            $table->integer('total');
            $table->enum('status', ['DIPINJAM', "DIKEMBALIKAN"]);
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
        Schema::dropIfExists('transaksi');
    }
}
