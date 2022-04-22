<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvSahiplerisTable extends Migration
{
    public function up()
    {
        Schema::create('ev_sahipleris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('evsahibi_adi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
