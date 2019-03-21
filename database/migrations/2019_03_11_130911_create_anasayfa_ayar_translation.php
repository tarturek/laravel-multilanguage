<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnasayfaAyarTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anasayfa_ayar_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('anasayfa_ayar_id');
            $table->string('locale')->index();
            $table->string('anasayfa_metin');



            $table->unique(['anasayfa_ayar_id','locale']);
            $table->foreign('anasayfa_ayar_id')->references('id')->on('anasayfa_ayar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anasayfa_ayar_translation');
    }
}
