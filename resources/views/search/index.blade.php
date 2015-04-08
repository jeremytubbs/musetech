@extends('app')

@section('content')

<div class="uk-grid uk-grid-collapse mt-header" data-uk-scrollspy="{{ count(Request::all()) == 0 ? "{cls:'uk-animation-slide-top uk-invisible', target:'> div > .uk-panel', delay:300, repeat: false}" : ""}}">
	<div class="uk-width-medium-1-1">
		<div class="uk-panel {{ count(Request::all()) == 0 ? "uk-invisible" : "" }}">
			<div class="uk-cover-background height-40" style="background-image: linear-gradient(45deg, #d0d8dd, #96a8b1);">
				<div class="uk-position-cover {{ count(Request::all()) == 0 ? "uk-invisible" : "" }}" data-uk-scrollspy="{{ count(Request::all()) == 0 ? "{cls:'uk-animation-fade uk-invisible', delay:600}" : "" }}">

					<div class="uk-container uk-container-center">
						<div class="uk-grid">

							<div class="uk-width-1-1 uk-margin-large-top uk-margin-bottom">
								<a href="/" class="logo-secondary">
									{!! file_get_contents(asset('/img/musetech-text-opt.svg')) !!}
								</a>
							</div>

							<div class="uk-width-medium-8-10 uk-push-1-10 uk-margin-top">
							{!! Form::open(['route' => ['search'], 'method' => 'GET', 'class' => 'uk-form', 'role' => 'form']) !!}
								<div class="uk-grid uk-grid-collapse">
									<div class="uk-width-8-10">
										{!! Form::text('query', $query, ['class' => 'uk-form-large uk-width-1-1', 'autofocus']) !!}
									</div>
									<div class="uk-width-2-10">
										<button class="uk-width-1-1 uk-button uk-button-danger uk-button-large" type="submit">
										<span class="uk-visible-small"><i class="uk-icon-search"></i></span>
										<span class="uk-hidden-small">Search</span>
										</button>
									</div>
								</div>
							{!! Form::close() !!}
							</div>

							<div class="uk-width-medium-8-10 uk-push-1-10 uk-margin-small">
								<p>Add a Project from Github: <a href="/project/add" class="">Here</a></p>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="uk-container uk-container-center uk-margin-top">
	<div class="uk-grid" data-uk-scrollspy="{cls:'uk-animation-fade uk-invisible', target:'> div > .uk-panel', delay:600, repeat: false}">
		<div class="uk-width-medium-8-10 uk-push-1-10">
			<div class="uk-panel uk-panel-box uk-invisible">
			<table class="uk-table">
				<thead>
					<tr>
						<th>{!! sort_search_by('name', 'Name', Request::get('query')) !!}</th>
						<th class="uk-hidden-small">{!! sort_search_by('owner', 'Owner', Request::get('query')) !!}</th>
						<th class="uk-hidden-small">{!! sort_search_by('language', 'Language', Request::get('query')) !!}</th>
						<th class="uk-hidden-small">{!! sort_search_by('stars', 'Stars', Request::get('query')) !!}</th>
						<th class="uk-hidden-small">{!! sort_search_by('last_updated', 'Updated', Request::get('query')) !!}</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($projects as $project)
					<tr>
						<td>
							<a class="uk-h3" href="{{ $project->github_url }}">{{ $project->name }}</a><span class="uk-visible-small uk-align-right"> {{ $project->updated }}</span><br>
							<p class="uk-margin-small-bottom">
								{{ $project->description }}
								@if($project->homepage)
								<a href="{{ $project->homepage }}">{{ $project->homepage }}</a>
								@endif
							</p>
							<span class="uk-visible-small">
								<span class="uk-badge">Owner: {{ $project->owner }}</span>
								<span class="uk-badge">Language: {{ $project->language }}</span>
								<span class="uk-badge">stars: {{ $project->stars }}</span>
							</span>
						</td>
						<td class="uk-hidden-small">{{ $project->owner }}</td>
						<td class="uk-hidden-small">{{ $project->language }}</td>
						<td class="uk-hidden-small">{{ $project->stars }}</td>
						<td class="uk-hidden-small">{{ $project->updated }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@include('partials.pagination', ['object' => $projects, 'request' => Request::except('page')])
			</div>
		</div>
	</div>
</div>

@endsection