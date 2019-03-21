<?php

namespace App\Http\Controllers\Admin;

use App\AnasayfaAyar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainpageSettingController extends Controller
{
    public function index()
    {
        $ayarlar = AnasayfaAyar::find(1);
        return view('admin.mainpagesettings.index',compact('ayarlar'));
    }


    public function update(Request $request, $id)
    {
        $ayar = AnasayfaAyar::find(1);

        $ayar->video = request('video');
        $ayar->yorumlar = request('yorumlar');
        $ayar->teklifler = request('teklifler');

        foreach(config('translatable.locales') as $count => $langs) {

            $ayar->getTranslation($langs)->anasayfa_metin = $request->get('anasayfa_metin')[$langs];


        }
        $ayar->save();
        return back()->with('success','Ayarlar Kaydedildi');
    }
}
