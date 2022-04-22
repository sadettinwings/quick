<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezervasyonTahsilatsTable extends Migration
{
    public function up()
    {
        Schema::create('rezervasyon_tahsilats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tutar')->nullable();
            $table->longText('aciklama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
