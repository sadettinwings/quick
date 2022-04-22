<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRezervasyonOdemelerisTable extends Migration
{
    public function up()
    {
        Schema::table('rezervasyon_odemeleris', function (Blueprint $table) {
            $table->unsignedBigInteger('musteri_sec_id')->nullable();
            $table->foreign('musteri_sec_id', 'musteri_sec_fk_6300300')->references('id')->on('musterilers');
            $table->unsignedBigInteger('rezervasyon_sec_id')->nullable();
            $table->foreign('rezervasyon_sec_id', 'rezervasyon_sec_fk_6300301')->references('id')->on('rezervasyonlars');
            $table->unsignedBigInteger('birim_sec_id')->nullable();
            $table->foreign('birim_sec_id', 'birim_sec_fk_6300305')->references('id')->on('parabirimis');
            $table->unsignedBigInteger('kasa_sec_id')->nullable();
            $table->foreign('kasa_sec_id', 'kasa_sec_fk_6300306')->references('id')->on('kasalars');
        });
    }
}
