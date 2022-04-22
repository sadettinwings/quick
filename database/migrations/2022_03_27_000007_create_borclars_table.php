<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorclarsTable extends Migration
{
    public function up()
    {
        Schema::create('borclars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('borc_aciklama')->nullable();
            $table->integer('tutar')->nullable();
            $table->longText('not')->nullable();
            $table->date('odeme_tarihi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
