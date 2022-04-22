<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonelOdemeKategorisTable extends Migration
{
    public function up()
    {
        Schema::create('personel_odeme_kategoris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pkategori')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
