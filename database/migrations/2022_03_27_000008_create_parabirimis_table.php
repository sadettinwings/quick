<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParabirimisTable extends Migration
{
    public function up()
    {
        Schema::create('parabirimis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('birim')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
