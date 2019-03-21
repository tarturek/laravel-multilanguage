<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAyarlarTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayarlar_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ayarlar_id');
            $table->string('locale')->index();
            $table->string('site_adi');
            $table->string('footer_yazisi')->nullable();
            $table->string('footerinfo')->nullable();
            $table->string('firma_adres')->nullable();
            $table->string('anasayfametin')->nullable();

            $table->unique(['ayarlar_id','locale']);
            $table->foreign('ayarlar_id')->references('id')->on('ayarlar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayarlar_translation');
    }
}
