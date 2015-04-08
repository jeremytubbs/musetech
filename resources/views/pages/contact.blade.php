@extends('app')

@section('htmlTag')
<html lang="en" class="uk-height-1-1">
@endSection

@section('bodyTag')
<body class="uk-height-1-1" style="background-image: linear-gradient(45deg, #d0d8dd, #96a8b1);">
@endSection

@section('content')
@include('flash::message')
<div class="uk-vertical-align uk-text-center uk-height-1-1 mt-header">
	<div class="uk-vertical-align-middle" style="width: 350px;">
		<a href="/" class="logo-secondary">
			{!! file_get_contents(asset('/img/musetech-text-opt.svg')) !!}
		</a>
		@if (count($errors) > 0)
		<div class="uk-alert uk-alert-info">
			There were some problems with your input.<br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!! Form::open(['route' => 'pages.contact', 'id' => 'contact-form', 'class' => 'uk-form uk-form-horizontal uk-panel uk-panel-box uk-form uk-margin-top']) !!}
			<div class="uk-form-row uk-margin-bottom-remove">
				<h3>Contact Us</h3>
			</div>
			<div class="uk-form-row">
				<input type="text" name="name" class="uk-form-large uk-form-width-large" placeholder="Your Name" value="{{ old('name') }}" required>
			</div>
			<div class="uk-form-row">
				<input type="email" name="email" class="uk-form-large uk-form-width-large" placeholder="email@example.com" value="{{ old('email') }}" required>
			</div>
			<div class="uk-form-row">
				<textarea name="message" rows="6" class="uk-form-large uk-form-width-large" placeholder="Your Message..." required>{{ old('message') }}</textarea>
			</div>
			<div class="uk-form-row">
				<button class="uk-button uk-button-large uk-button-danger" type="submit">Send Message</button>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection