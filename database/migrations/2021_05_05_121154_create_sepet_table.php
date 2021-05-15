<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSepetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sepet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kullanici_id')->unsigned();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('kullanici_id')->references('id')->on('kullanici')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sepet');
    }
}
