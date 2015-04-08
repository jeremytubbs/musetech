<nav class="uk-navbar mt-navbar">
	<ul class="uk-navbar-nav">
		<li><a class="uk-navbar-toggle" data-uk-offcanvas="{target:'#my-id'}"></a></li>
	</ul>
	@if(Request::path() != 'search')
	<div class="uk-navbar-flip">
		<ul class="uk-navbar-nav">
			<li><a href="/search"><i class="uk-icon-search"></i> <span class="uk-hidden-small">Search Projects</span></a></li>
		</ul>
	</div>
	@endif
</nav>

<div id="my-id" class="uk-offcanvas">
	<div class="uk-offcanvas-bar">
		<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
			<li><a href="/">Home</a></li>
			<li class="uk-nav-divider"></li>
			<li><a href="/sign-up">Sign up</a></li>
			<li class="uk-nav-divider"></li>
			<li><a href="/search">Search Projects</a></li>
			<li><a href="/project/add">Add Project</a></li>
			<li class="uk-nav-divider"></li>
			<li><a href="/contact">Contact</a></li>
		</ul>
	</div>
</div>