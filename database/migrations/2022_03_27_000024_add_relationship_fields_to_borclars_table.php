<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBorclarsTable extends Migration
{
    public function up()
    {
        Schema::table('borclars', function (Blueprint $table) {
            $table->unsignedBigInteger('cari_sec_id')->nullable();
            $table->foreign('cari_sec_id', 'cari_sec_fk_6299960')->references('id')->on('carilers');
            $table->unsignedBigInteger('evsahibi_sec_id')->nullable();
            $table->foreign('evsahibi_sec_id', 'evsahibi_sec_fk_6299961')->references('id')->on('ev_sahipleris');
            $table->unsignedBigInteger('personel_sec_id')->nullable();
            $table->foreign('personel_sec_id', 'personel_sec_fk_6299962')->references('id')->on('users');
            $table->unsignedBigInteger('birim_sec_id')->nullable();
            $table->foreign('birim_sec_id', 'birim_sec_fk_6299985')->references('id')->on('parabirimis');
        });
    }
}
