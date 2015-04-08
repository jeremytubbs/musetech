@if($object->hasPages())

<?php
	$sortBy = isset($request['sortBy']) ? $request['sortBy'] : NULL;
	$orderBy = isset($request['orderBy']) ? $request['orderBy'] : NULL;
	$query = isset($request['query']) ? $request['query'] : NULL;
?>

<ul class="uk-pagination">
	@if($object->currentPage() == 1)
	<li class="uk-disabled uk-pagination-previous">
		<span><i class="uk-icon-angle-double-left"></i> Previous</span>
	</li>
	@else
	<li class="uk-pagination-previous">
		<a href="{!! route('search', ['sortBy' => $sortBy, 'orderBy' => $orderBy, 'query' => $query, 'page' => $object->currentPage()-1 ]) !!}">
			<span><i class="uk-icon-angle-double-left"></i> Previous</span>
		</a>
	</li>
	@endif
	<li class="uk-hidden-small uk-margin-small-top">
		<p class="uk-text-small">{{ $object->total() }} matched results. Showing page {{ $object->currentPage() }} of {{ $object->lastPage() }}.
		</p>
	</li>
	@if($object->currentPage() == $object->lastPage())
	<li class="uk-disabled uk-pagination-next">
		<span>Next <i class="uk-icon-angle-double-right"></i></span>
	</li>
	@else
	<li class="uk-pagination-next">
		<a href="{!! route('search', ['sortBy' => $sortBy, 'orderBy' => $orderBy, 'query' => $query, 'page' => $object->currentPage()+1 ]) !!}">
			<span>Next <i class="uk-icon-angle-double-right"></i></span>
		</a>
	</li>
	@endif
</ul>
<div class="uk-text-small uk-visible-small">
	<center>{{ $object->total() }} matched results. Showing page {{ $object->currentPage() }} of {{ $object->lastPage() }}.</center>
</div>

@endif