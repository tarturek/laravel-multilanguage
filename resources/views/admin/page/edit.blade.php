@extends ('admin/template')

@section('content')



<div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">

          <h4 class="mt-0 header-title">Sayfa Düzenle</h4>



            {!! Form::model($sayfa,['route'=>['page.update',$sayfa->id],'method'=>'PUT','class'=>'form-horizontal','files'=>'true']) !!}

            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Sayfa Başlığı</label>
                 <div class="col-sm-10">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                 <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                  <input class="form-control" type="text" name="baslik[{{$localeCode}}]" value="{{$sayfa->translate($localeCode)->baslik}}" required>

                  @endforeach
                  </div>
             </div>
              <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Sayfa İçeriği</label>
                  <div class="col-sm-10">
                   @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                   <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                   <textarea class="form-control" name="icerik[{{$localeCode}}]">{{$sayfa->translate($localeCode)->icerik}}</textarea>

                   @endforeach
                   </div>
               </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Görsel</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="file" name="resim">

                  </div>
             </div>



              <button type="submit" class="btn btn-primary waves-effect waves-light">
              Kaydet
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