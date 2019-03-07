<html>
//Controllerdan Gelen data-->
<h3>

{{$ulke->name}}
<br><br>
<br>
@foreach($ulkeler as $ulkecik)

{{$ulkecik->name}}
<br>
<hr>


@endforeach

</h3>
<br><br>

//lang sabit den gelen
<a href="{{route('diller')}}">{{trans('welcome.merhaba')}}</a>

<br><br><br>

// Dilin adını Yazdırma ---->>>
	@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
<br>
		{{--<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, '/', [], true) }}">--}}
		<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, \URL::current(), [], true) }}">

			{{ $properties['native'] }}

		</a>

	@endforeach
	<br>
// Dilin adını Yazdırma ---->>>


<br><br>


//Normal Form Kullanımı
<form method="post" action="/ulkekayit">
{{csrf_field()}}
<ul>
<li>
Kodu: <input type="text" name="code">
</li>
Ülke Adı:
@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

<li>
{{ $properties['native'] }}:
<input type="text" name="name[{{$localeCode}}]">
</li>

@endforeach
<button type="submit" class="btn btn-success">Ekle</button>
 </ul>
</form>
//Normal Form Kullanımı


<br><br><br><br>



//BootForm Kullanıldı

{!! BootForm::open()->post()->action('/ulkekayit') !!}
{!! BootForm::text('Code', 'code') !!}
{!! TranslatableBootForm::text('Ülke Adı / ', 'name') !!}
<div class="form-actions">
   <button type="submit" class="btn btn-success">Ekle</button>
</div>
{!! BootForm::close() !!}
//BootForm Kullanıldı
<br>

<br>
@foreach(config('translatable.locales') as $count => $langs )

<br>
{{$langs}}

@endforeach

</html>