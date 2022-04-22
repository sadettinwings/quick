<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusterilersTable extends Migration
{
    public function up()
    {
        Schema::create('musterilers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('musteri_adi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
