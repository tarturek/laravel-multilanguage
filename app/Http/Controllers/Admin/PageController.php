<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Dimsav\Translatable\Test\Model\Country;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function index()
    {
        $sayfalar = Page::all();

        return view('admin.page.index',compact('sayfalar'));
    }


    public function create()
    {
        return view('admin.page.create');
    }


    public function store(Request $request)
    {
        $page = new Page();


        if (request()->hasFile('resim')) {

            $validator = Validator::make($request->all(), [
                'resim' => 'image|mimes:jpeg,png,jpg,gif,svg|max:512',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Dosya Yükleme Hatası');
            }

            $resim = request()->file('resim');
            $dosya_adi = 'page' . '-' . time() . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = 'uploads/sayfalar';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $page->resim = $dosya_yolu;


            }
        }


        /*$page->{'baslik:en'} = $request->get('baslik')['en'];
        $page->{'icerik:en'} = $request->get('icerik')['en'];
        $page->{'baslik:tr'} = $request->get('baslik')['tr'];
        $page->{'icerik:tr'} = $request->get('icerik')['tr'];*/

        foreach(config('translatable.locales') as $langs)

        {
            $page->{'baslik:'.$langs } = $request->get('baslik')[$langs];
            $page->{'icerik:'.$langs} = $request->get('icerik')[$langs];

        }



        $page->save();


        /*$data = [

            'resim'=> $dosya_yolu,

            'en'  => [
                'baslik' => $request->get('baslik')['en'],
                'icerik' => $request->get('icerik')['en'],
                'slug' => Str::slug(($request->get('baslik')['en']),'-'),
            ],

            'tr'  => [
                'baslik' => $request->get('baslik')['tr'],
                'icerik' => $request->get('icerik')['tr'],
                'slug' => Str::slug(($request->get('baslik')['tr']),'-'),
            ],

        ];

       Page::create($data);*/

        return back()->with('success','Sayfa Eklendi');
    }



    public function edit($id)
    {
        $sayfa = Page::find($id);

        return view ('admin.page.edit',compact('sayfa'));
    }


    public function update(Request $request, $id)
    {

        $page = Page::find($id);
        if (request()->hasFile('resim')) {

            $validator = Validator::make($request->all(), [
                'resim' => 'image|mimes:jpeg,png,jpg,gif,svg|max:512',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Dosya Yükleme Hatası');
            }

            $resim = request()->file('resim');
            $dosya_adi = 'page' . '-' . time() . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = 'uploads/sayfalar';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);

                $page->resim = $dosya_yolu;

            }
        }


        /*$page->translate('tr')->baslik = $request->get('baslik')['tr'];
        $page->translate('tr')->icerik = $request->get('icerik')['tr'];
        $page->translate('en')->baslik = $request->get('baslik')['en'];
        $page->translate('en')->icerik = $request->get('icerik')['en'];*/

        foreach(config('translatable.locales') as $count => $langs){
            $page->translate($langs)->baslik = $request->get('baslik')[$langs];
            $page->translate($langs)->icerik = $request->get('icerik')[$langs];
        }


        $page->save();




       return back()->with('success','Sayfa Güncellendi');
    }


    public function destroy($id)
    {
        Page::where('id',$id)->delete();
        return back()->with('success','Sayfa Silindi');
    }
}
