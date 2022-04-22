<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRezervasyonTahsilatsTable extends Migration
{
    public function up()
    {
        Schema::table('rezervasyon_tahsilats', function (Blueprint $table) {
            $table->unsignedBigInteger('musteri_sec_id')->nullable();
            $table->foreign('musteri_sec_id', 'musteri_sec_fk_6300005')->references('id')->on('musterilers');
            $table->unsignedBigInteger('rezervasyon_sec_id')->nullable();
            $table->foreign('rezervasyon_sec_id', 'rezervasyon_sec_fk_6300006')->references('id')->on('rezervasyonlars');
            $table->unsignedBigInteger('kasa_sec_id')->nullable();
            $table->foreign('kasa_sec_id', 'kasa_sec_fk_6300007')->references('id')->on('kasalars');
            $table->unsignedBigInteger('birim_sec_id')->nullable();
            $table->foreign('birim_sec_id', 'birim_sec_fk_6300013')->references('id')->on('parabirimis');
        });
    }
}
