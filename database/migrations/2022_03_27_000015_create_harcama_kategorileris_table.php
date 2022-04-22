<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarcamaKategorilerisTable extends Migration
{
    public function up()
    {
        Schema::create('harcama_kategorileris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hkategori')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
