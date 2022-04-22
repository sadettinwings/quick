<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahsilatKategorilerisTable extends Migration
{
    public function up()
    {
        Schema::create('tahsilat_kategorileris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tkategori_adi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
