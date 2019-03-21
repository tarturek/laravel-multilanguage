@extends ('admin/template')

@section('content')



<div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">

          <h4 class="mt-0 header-title">Sayfa Ekle</h4>



            {!! Form::open(['route'=>'page.store','method'=>'POST','class'=>'form-horizontal','files'=>'true']) !!}

            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Sayfa Başlığı</label>
                 <div class="col-sm-10">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                 <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                  <input class="form-control" type="text" name="baslik[{{$localeCode}}]" required>

                  @endforeach
                  </div>
             </div>
              <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Sayfa İçeriği</label>
                  <div class="col-sm-10">
                   @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                   <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                   <textarea class="form-control" name="icerik[{{$localeCode}}]"></textarea>

                   @endforeach
                   </div>
               </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Görsel</label>
                 <div class="col-sm-10">

                 <input class="form-control" type="file" name="resim" multiple="multiple">

                  </div>
             </div>



              <button type="submit" class="btn btn-primary waves-effect waves-light">
              Ekle
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
<!-- Dropzone js -->
<script src="/admin/assets/plugins/dropzone/dist/dropzone.js"></script>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

@endsection