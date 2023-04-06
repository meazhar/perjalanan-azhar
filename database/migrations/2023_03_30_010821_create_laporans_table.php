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
        Schema::create('laporanbug', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['functionalerror','performance defects','usabilititydefects','compatibilityerror','securityerror','syntaxerror','logicerror']);
            $table->string('deskripsi');
            $table->date('tglkejadian');
            $table->string('pelapor');
            $table->enum('status', ['solved', 'onprogress', 'reported']);
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
        Schema::dropIfExists('laporanbug');
    }
};
