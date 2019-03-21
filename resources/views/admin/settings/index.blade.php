@extends ('admin/template')

@section('content')



<div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">

          <h4 class="mt-0 header-title">Web Site Ayarları</h4>



            {!! Form::model($ayarlar,['route'=>['settings.update',1],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}

            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Site Başlık</label>
                 <div class="col-sm-10">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                 <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                  <input class="form-control" type="text" value="{{$ayarlar->translate($localeCode)->site_adi}}" name="site_adi[{{$localeCode}}]" required>

                  @endforeach
                  </div>
             </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Logo</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="file" name="logo">
                <img src="/{{$ayarlar->logo}}" width="200px" height="100px">
                  </div>
             </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fav Icon</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="file" name="favicon">
                <img src="/{{$ayarlar->favicon}}" width="50px" height="50px">
                  </div>
             </div>
              <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Anasayfa Metin</label>
                              <div class="col-sm-10">
                               @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                              <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                              <textarea class="form-control" name="site_adi[{{$localeCode}}]">{{$ayarlar->translate($localeCode)->anasayfametin}}</textarea>

                               @endforeach
                               </div>
                          </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Telefon</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="text" value="{{$ayarlar->telefon}}" name="telefon">
                  </div>
             </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">E-Posta</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="text" value="{{$ayarlar->email}}" name="telefon">
                  </div>
             </div>
             <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Adres</label>
                              <div class="col-sm-10">
                               @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                              <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                               <input class="form-control" type="text" value="{{$ayarlar->translate($localeCode)->firma_adres}}" name="firma_adres[{{$localeCode}}]" required>

                               @endforeach
                               </div>
              </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Google Harita Iframe</label>
                 <div class="col-sm-10">

                 <textarea class="form-control" name="googlemap">{{$ayarlar->googlemap}}</textarea>
                  </div>
             </div>
           <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="text" value="{{$ayarlar->facebook}}" name="facebook">
                  </div>
             </div>
           <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Instagram</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="text" value="{{$ayarlar->instagram}}" name="instagram">
                  </div>
             </div>
          <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="text" value="{{$ayarlar->twitter}}" name="twitter">
                  </div>
             </div>
          <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="text" value="{{$ayarlar->linkedin}}" name="linkedin">
                  </div>
             </div>
          <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Pinterest</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="text" value="{{$ayarlar->pinterest}}" name="pinterest">
                  </div>
             </div>
          <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Youtube</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="text" value="{{$ayarlar->youtube}}" name="youtube">
                  </div>
             </div>
          <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Para Birimi</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="text" value="{{$ayarlar->parabirimi}}" name="parabirimi">
                  </div>
             </div>
             <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Footer Yazısı</label>
                              <div class="col-sm-10">
                               @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                              <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                               <input class="form-control" type="text" value="{{$ayarlar->translate($localeCode)->footer_yazisi}}" name="footer_yazisi[{{$localeCode}}]" required>

                               @endforeach
                               </div>
              </div>
             <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Footer Copywrite</label>
                              <div class="col-sm-10">
                               @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                              <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                               <input class="form-control" type="text" value="{{$ayarlar->translate($localeCode)->footerinfo}}" name="footerinfo[{{$localeCode}}]" required>

                               @endforeach
                               </div>
              </div>


              <button type="submit" class="btn btn-primary waves-effect waves-light">
              Güncelle
              </button>



            {!! Form::close() !!}
       </div>
      </div>

    </div>

</div>

@endsection

@section('css')

@endsection

@section('js')

@endsection