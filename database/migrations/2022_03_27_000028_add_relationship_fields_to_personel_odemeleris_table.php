<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPersonelOdemelerisTable extends Migration
{
    public function up()
    {
        Schema::table('personel_odemeleris', function (Blueprint $table) {
            $table->unsignedBigInteger('personel_sec_id')->nullable();
            $table->foreign('personel_sec_id', 'personel_sec_fk_6300236')->references('id')->on('users');
            $table->unsignedBigInteger('personel_kategori_id')->nullable();
            $table->foreign('personel_kategori_id', 'personel_kategori_fk_6300237')->references('id')->on('personel_odeme_kategoris');
            $table->unsignedBigInteger('birim_sec_id')->nullable();
            $table->foreign('birim_sec_id', 'birim_sec_fk_6300240')->references('id')->on('parabirimis');
            $table->unsignedBigInteger('kasa_sec_id')->nullable();
            $table->foreign('kasa_sec_id', 'kasa_sec_fk_6300260')->references('id')->on('kasalars');
        });
    }
}
