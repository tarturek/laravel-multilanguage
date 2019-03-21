<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnasayfaAyarTranslation extends Model
{
    protected $table = 'anasayfa_ayar_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['anasayfa_metin'];
}
