<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiparisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sepet_id')->unsigned();
            $table->decimal('siparis_tutari',10,4);
            $table->string('durum',30)->nullable();
            $table->string('adsoyad',50)->nullable();
            $table->string('adres',200)->nullable();
            $table->string('telefon',15)->nullable();
            $table->string('ceptelefonu',15)->nullable();
            $table->string('banka',20)->nullable();
            $table->integer('taksit_sayisi')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->unique('sepet_id');
            $table->foreign('sepet_id')->references('id')->on('sepet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siparis');
    }
}
