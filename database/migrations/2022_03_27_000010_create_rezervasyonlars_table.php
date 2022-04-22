<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezervasyonlarsTable extends Migration
{
    public function up()
    {
        Schema::create('rezervasyonlars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rezervarsyon_kodu')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
