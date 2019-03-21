@extends ('admin/template')

@section('content')



<div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">

          <h4 class="mt-0 header-title">Anasayfa Ayarları</h4>



            {!! Form::model($ayarlar,['route'=>['mainpagesettings.update',1],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}

            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Anasayfa Metin</label>
                 <div class="col-sm-10">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                 <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                  <textarea class="form-control" name="anasayfa_metin[{{$localeCode}}]">
                  {!! $ayarlar->translate($localeCode)->anasayfa_metin !!}
                  </textarea>

                  @endforeach
                  </div>
             </div>

                <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Video</label>
                        <div class="controls">
                             <input class="form-control" size="15" type="text" value="{{$ayarlar->video}}" name="video">
                        </div>
                 </div>


                <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Yorumlar</label>
                        <div class="controls">
                            <select name="yorumlar" class="form-control">

                                @if($ayarlar->yorumlar=='evet')
                                <option  value="evet" selected>Göster</option>
                                <option  value="hayir" >Gösterme</option>
                                @else
                                    <option  value="evet" >Göster</option>
                                    <option  value="hayir" selected>Gösterme</option>
                                @endif
                            </select>
                        </div>
                    </div>
                <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Teklifler</label>
                        <div class="controls">
                            <select name="teklifler" class="form-control">

                                @if($ayarlar->teklifler=='evet')
                                <option  value="evet" selected>Göster</option>
                                <option  value="hayir" >Gösterme</option>
                                @else
                                    <option  value="evet" >Göster</option>
                                    <option  value="hayir" selected>Gösterme</option>
                                @endif
                            </select>
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
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

@endsection