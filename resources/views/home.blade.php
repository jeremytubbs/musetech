@extends('app')

@section('content')
<div class="uk-grid uk-grid-collapse mt-header" data-uk-scrollspy="{cls:'uk-animation-slide-top uk-invisible', target:'> div > .uk-panel', delay:300, repeat: false}">
	<div class="uk-width-1-1">
		<div class="uk-panel uk-invisible">
			<div class="uk-cover-background height-70" style="background-image: linear-gradient(45deg, #d0d8dd, #96a8b1);">
				<div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle uk-invisible" data-uk-scrollspy="{cls:'uk-animation-fade uk-invisible', delay:600}">
					<div class="uk-container uk-container-center">
						<div class="uk-grid uk-margin-small uk-margin-top">
							<div class="uk-width-1-1">
								<a href="/" class="logo">
									{!! file_get_contents(asset('/img/musetech-sub-opt.svg')) !!}
								</a>
							</div>
						</div>

						<div class="uk-grid uk-margin-small">
							<div class="uk-width-1-1 uk-flex uk-flex-center">
								<h1 class="logo-text">Slack Chat for #musetech</h1>
							</div>
						</div>

						<div class="uk-grid uk-margin-small">
							<div class="uk-width-1-1 uk-flex uk-flex-center">
								<a href="/sign-up" class="uk-button uk-button-danger uk-button-large uk-width-1-2">Sign up</a>
							</div>
						</div>

						<div class="uk-grid uk-margin-top-remove">
							<div class="uk-width-1-1 uk-flex uk-flex-center">
								<p>already a member? <a href="https://musetech.slack.com">sign in here</a></p>
							</div>
						</div>

						<div class="uk-grid uk-margin-top-remove">
							<div class="uk-width-1-1 uk-flex uk-flex-center">
								<h5>Join us as member #{{ $userCount+1 }}</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="uk-container uk-container-center">
	<div class="uk-grid" data-uk-scrollspy="{cls:'uk-animation-fade uk-invisible', target:'> div > .uk-panel', delay:600, repeat: false}">
		<div class="uk-width-medium-6-10 uk-push-2-10 uk-margin-large-bottom">
			<div class="uk-panel uk-invisible">
				<article class="uk-article">
					<p class="uk-article-lead">Welcome to the #musetech Slack community.</p>
					<p>Using Slack allows teams to chat via real-time messaging and search up 10,000 archived messages for free. Slack also allows for some excellent integrations; all tweets tagged #musetech are rebroadcast in our 'news' channel.</p>
					<p>This site also features a searchable registry of #musetech projects available on Github. Search inspired by: <a href="https://github.com/MuseCompNet/muse-tech-central">MuseCompNet/muse-tech-central</a>.</p>
					<p>Site created by <a href="https://twitter.com/jeremytubbs">@JeremyTubbs</a> a member of the <a href="http://lab.imamuseum.org/about/">IMA Lab Team</a>.</p>
				</article>
			</div>
		</div>
	</div>
</div>
@endsection
