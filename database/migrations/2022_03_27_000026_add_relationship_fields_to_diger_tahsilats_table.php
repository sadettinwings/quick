<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDigerTahsilatsTable extends Migration
{
    public function up()
    {
        Schema::table('diger_tahsilats', function (Blueprint $table) {
            $table->unsignedBigInteger('tkategori_sec_id')->nullable();
            $table->foreign('tkategori_sec_id', 'tkategori_sec_fk_6300106')->references('id')->on('tahsilat_kategorileris');
            $table->unsignedBigInteger('kategori_sec_id')->nullable();
            $table->foreign('kategori_sec_id', 'kategori_sec_fk_6300094')->references('id')->on('borc_kategorileris');
            $table->unsignedBigInteger('personel_sec_id')->nullable();
            $table->foreign('personel_sec_id', 'personel_sec_fk_6300067')->references('id')->on('users');
            $table->unsignedBigInteger('cari_sec_id')->nullable();
            $table->foreign('cari_sec_id', 'cari_sec_fk_6300068')->references('id')->on('carilers');
            $table->unsignedBigInteger('musteri_sec_id')->nullable();
            $table->foreign('musteri_sec_id', 'musteri_sec_fk_6300069')->references('id')->on('musterilers');
            $table->unsignedBigInteger('birim_sec_id')->nullable();
            $table->foreign('birim_sec_id', 'birim_sec_fk_6300071')->references('id')->on('parabirimis');
        });
    }
}
