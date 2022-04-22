<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarilersTable extends Migration
{
    public function up()
    {
        Schema::create('carilers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cari_adi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
