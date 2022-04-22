<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasalarsTable extends Migration
{
    public function up()
    {
        Schema::create('kasalars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kasa_adi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
