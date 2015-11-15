@extends('app')

@section('content')
	<a href="/" class="logo">
		{!! file_get_contents(asset('/img/musetech-sub-opt.svg')) !!}
	</a>
@endsection