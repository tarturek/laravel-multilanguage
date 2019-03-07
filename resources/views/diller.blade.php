<html>

<h3>

{{$ulke->name}}

</h3>

<li class="dropdown "><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ LaravelLocalization::getCurrentLocaleName() }}<i class="fa fa-angle-down"></i></a>

<ul class="dropdown-menu">



	@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

	<li>

		<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, '/', [], true) }}">

			{{ $properties['native'] }}

		</a>

	</li>

	@endforeach

</ul>

</html>