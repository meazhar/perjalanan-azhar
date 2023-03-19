<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulasitransaksi', function (Blueprint $table) {
            $table->id();
            // $table->date('tanggalbeli');
            // $table->string('namabarang');
            // $table->string('harga');
            // $table->string('qty');
            // $table->('');
            // $table->string('totalharga');
            // $table->string('jenisbayar');
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
        Schema::dropIfExists('simulasitransaksis');
    }
};
