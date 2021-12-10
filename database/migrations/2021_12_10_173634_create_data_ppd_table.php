<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPpdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ppd', function (Blueprint $table) {
            $table->id();
            $table->enum('category',['permintaan data', 'Konsultasi Statistik']);
            $table->foreignId('uid');
            $table->string('subject');
            $table->string('desc');
            $table->string('file');
            $table->enum('status',['diterima','diproses','gagal']);
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
        Schema::dropIfExists('data_ppd');
    }
}
