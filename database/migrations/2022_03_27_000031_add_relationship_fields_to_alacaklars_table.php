<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAlacaklarsTable extends Migration
{
    public function up()
    {
        Schema::table('alacaklars', function (Blueprint $table) {
            $table->unsignedBigInteger('musteri_sec_id')->nullable();
            $table->foreign('musteri_sec_id', 'musteri_sec_fk_6300332')->references('id')->on('musterilers');
            $table->unsignedBigInteger('tesis_sec_id')->nullable();
            $table->foreign('tesis_sec_id', 'tesis_sec_fk_6300333')->references('id')->on('ev_sahipleris');
            $table->unsignedBigInteger('cari_sec_id')->nullable();
            $table->foreign('cari_sec_id', 'cari_sec_fk_6300334')->references('id')->on('carilers');
            $table->unsignedBigInteger('birim_sec_id')->nullable();
            $table->foreign('birim_sec_id', 'birim_sec_fk_6300336')->references('id')->on('parabirimis');
        });
    }
}
