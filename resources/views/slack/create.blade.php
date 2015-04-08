@extends('app')


@section('htmlTag')
<html lang="en" class="uk-height-1-1">
@endSection

@section('bodyTag')
<body class="uk-height-1-1" style="background-image: linear-gradient(45deg, #d0d8dd, #96a8b1);">
@endSection

@section('content')

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
		{!! Form::open(['route' => ['slack.store'], 'method' => 'POST', 'role' => 'form', 'class' => 'uk-form uk-form-stacked uk-panel uk-panel-box uk-form uk-margin-top']) !!}
			<div class="uk-form-row">
				<h3>Join the Community</h3>
			</div>
			<div class="uk-form-row">
				{!! Form::text('first_name', null, ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'First Name', 'autofocus'] ) !!}
			</div>
			<div class="uk-form-row">
				{!! Form::text('last_name', null, ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Last Name'] ) !!}
			</div>
			<div class="uk-form-row">
				{!! Form::email('email', null, ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Email'] ) !!}
			</div>
			<div class="uk-form-row">
				<label class="uk-form-label uk-align-left">Twitter Handle (optional)</label>
				{!! Form::text('twitter', null, ['class' => 'uk-form-large uk-width-1-1', 'placeholder' => '@username']) !!}
			</div>
			<div class="uk-form-row">
				<button class="uk-width-1-2 uk-button uk-button-danger uk-button-large" type="submit" name="sign-up">Sign up</button>
			</div>
		{!! Form::close() !!}
	</div>
</div>

@endsection