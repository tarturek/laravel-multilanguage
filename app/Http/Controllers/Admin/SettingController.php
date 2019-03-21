<?php

namespace App\Http\Controllers\Admin;

use App\AnasayfaAyar;
use App\Ayarlar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function index()
    {
        $ayarlar = Ayarlar::find(1);
        return view('admin.settings.index',compact('ayarlar'));
    }



    public function update(Request $request, $id)
    {
        $ayar = Ayarlar::find(1);

        $ayar->telefon = request('telefon');
        $ayar->email = request('email');
        $ayar->googlemap = request('googlemap');
        $ayar->facebook = request('facebook');
        $ayar->instagram = request('instagram');
        $ayar->twitter = request('twitter');
        $ayar->linkedin = request('linkedin');
        $ayar->pinterest = request('pinterest');
        $ayar->youtube = request('youtube');
        $ayar->parabirimi = request('parabirimi');

        // Logo Yükleme
        if (request()->hasFile('logo')) {

            $validator = Validator::make($request->all(), [
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:512',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Logo max 512mb olmalı');
            }

                $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:1024'));
                $logo = request()->file('logo');
                $dosya_adi = 'logo' . '-' . time() . '.' . $logo->extension();

                if ($logo->isValid()) {

                    $hedef_klasor = 'uploads/dosyalar';
                    $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                    $logo->move($hedef_klasor, $dosya_adi);
                    $ayar->logo = $dosya_yolu;

                } else {

                    return back()->with('error','Logo Yükleme Hatası');;

                }

        }
        // Logo Yükleme

        // Favicon Yükleme
        if (request()->hasFile('favicon')) {

            $validator = Validator::make($request->all(), [
                'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:512',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Dosya Boutu Çok Büyük. Max 512MB');
            }
            if (request()->hasFile('favicon')) {

                $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:100'));
                $fav = request()->file('favicon');
                $favdosya_adi = 'favicon' . '-' . time() . '.' . $fav->extension();

                if ($fav->isValid()) {

                    $favhedef_klasor = 'uploads/dosyalar';
                    $favdosya_yolu = $favhedef_klasor . '/' . $favdosya_adi;
                    $fav->move($favhedef_klasor, $favdosya_adi);
                    $ayar->favicon = $favdosya_yolu;

                }
            }
        }
        // Favicon Yükleme

        foreach(config('translatable.locales') as $count => $langs) {

            $ayar->getTranslation($langs)->site_adi = $request->get('site_adi')[$langs];
            $ayar->getTranslation($langs)->footer_yazisi = $request->get('footer_yazisi')[$langs];
            $ayar->getTranslation($langs)->footerinfo = $request->get('footerinfo')[$langs];
            $ayar->getTranslation($langs)->firma_adres = $request->get('firma_adres')[$langs];

        }
        $ayar->save();
        return back()->with('success','Ayarlar Kaydedildi');
    }




    public function anasayfa()
    {
        $ayarlar = AnasayfaAyar::find(1);
        return view('admin.mainpage.index',compact('ayarlar'));
    }

}
