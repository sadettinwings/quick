<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlacaklarsTable extends Migration
{
    public function up()
    {
        Schema::create('alacaklars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tutar')->nullable();
            $table->longText('aciklama')->nullable();
            $table->date('odeme_tarihi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
