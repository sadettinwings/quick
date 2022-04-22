<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHarcamalarsTable extends Migration
{
    public function up()
    {
        Schema::table('harcamalars', function (Blueprint $table) {
            $table->unsignedBigInteger('harcama_kategori_id')->nullable();
            $table->foreign('harcama_kategori_id', 'harcama_kategori_fk_6300248')->references('id')->on('harcama_kategorileris');
            $table->unsignedBigInteger('borc_sec_id')->nullable();
            $table->foreign('borc_sec_id', 'borc_sec_fk_6300249')->references('id')->on('borclars');
            $table->unsignedBigInteger('cari_sec_id')->nullable();
            $table->foreign('cari_sec_id', 'cari_sec_fk_6300250')->references('id')->on('carilers');
            $table->unsignedBigInteger('birim_sec_id')->nullable();
            $table->foreign('birim_sec_id', 'birim_sec_fk_6300252')->references('id')->on('parabirimis');
            $table->unsignedBigInteger('kasa_sec_id')->nullable();
            $table->foreign('kasa_sec_id', 'kasa_sec_fk_6300254')->references('id')->on('kasalars');
        });
    }
}
