<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarcamalarsTable extends Migration
{
    public function up()
    {
        Schema::create('harcamalars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tutar')->nullable();
            $table->date('tarih')->nullable();
            $table->longText('aciklama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
