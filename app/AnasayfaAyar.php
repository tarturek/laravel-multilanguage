<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnasayfaAyar extends Model
{
    protected $table = 'anasayfa_ayar';
    protected $guarded = [];

    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = [
        'anasayfa_metin'
    ];

}
