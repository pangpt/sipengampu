<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePutusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('putusan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_akta');
            $table->string('seri_akta');
            $table->string('no_perkara');
            $table->string('file_putusan',1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('putusan');
    }
}
