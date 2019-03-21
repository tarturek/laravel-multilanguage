@extends('admin/template')

@section('content')

<div class="row"><div style="float:left; margin: 15px 0 5px 0;"><a href="{{route('page.create')}}" class="btn btn-success">Yeni Sayfa</a></div>
    <div class="col-12">
       <div class="card m-b-30">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Sayfalar</h4>
                                            <p class="text-muted m-b-30 font-14">
                                            </p>

                                            <table id="datatable" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th width="80%">Sayfa Başlığı</th>

                                                    <th>Düzenle</th>
                                                    <th>Sil</th>
                                                </tr>
                                                </thead>


                                                <tbody>
                                                @foreach($sayfalar as $sayfa)
                                                <tr>
                                                    <td>{{$sayfa->baslik}}</td>
                                                    <td><a href="{{route('page.edit', $sayfa->id)}}" class="btn btn-success">Düzenle</a></td>
                        {!! Form::model($sayfa,['route'=>['page.destroy',$sayfa->id],'method'=>'DELETE']) !!}
                        <td class="center">
                            <button type="submit" onclick="return window.confirm('Silmek istediğinize eminmisiniz?');" class="btn btn-danger ">Sil</button>
                        </td>

                        {!! Form::close() !!}


                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
    </div> <!-- end col -->
 </div> <!-- end row -->

@endsection

@section('css')

@endsection


@section('js')


@endsection