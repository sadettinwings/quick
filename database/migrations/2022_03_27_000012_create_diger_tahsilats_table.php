<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigerTahsilatsTable extends Migration
{
    public function up()
    {
        Schema::create('diger_tahsilats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tutar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
