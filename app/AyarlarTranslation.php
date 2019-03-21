<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AyarlarTranslation extends Model
{
    protected $table = 'ayarlar_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['site_adi'];
}
