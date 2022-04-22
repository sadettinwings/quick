<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonelOdemelerisTable extends Migration
{
    public function up()
    {
        Schema::create('personel_odemeleris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tarih')->nullable();
            $table->integer('tutar')->nullable();
            $table->longText('aciklama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
