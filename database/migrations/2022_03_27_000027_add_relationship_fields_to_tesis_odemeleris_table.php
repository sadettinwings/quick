<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTesisOdemelerisTable extends Migration
{
    public function up()
    {
        Schema::table('tesis_odemeleris', function (Blueprint $table) {
            $table->unsignedBigInteger('tesis_sec_id')->nullable();
            $table->foreign('tesis_sec_id', 'tesis_sec_fk_6300188')->references('id')->on('ev_sahipleris');
            $table->unsignedBigInteger('borc_sec_id')->nullable();
            $table->foreign('borc_sec_id', 'borc_sec_fk_6300189')->references('id')->on('borclars');
            $table->unsignedBigInteger('rezervasyon_sec_id')->nullable();
            $table->foreign('rezervasyon_sec_id', 'rezervasyon_sec_fk_6300190')->references('id')->on('rezervasyonlars');
            $table->unsignedBigInteger('kasa_sec_id')->nullable();
            $table->foreign('kasa_sec_id', 'kasa_sec_fk_6300192')->references('id')->on('kasalars');
            $table->unsignedBigInteger('birim_sec_id')->nullable();
            $table->foreign('birim_sec_id', 'birim_sec_fk_6300193')->references('id')->on('parabirimis');
        });
    }
}
