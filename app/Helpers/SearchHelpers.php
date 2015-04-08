<?php

function sort_search_by($column, $body, $query)
{
	$order = (\Request::get('orderBy') == 'asc') ? 'desc' : 'asc';
	return link_to_route('search', $body, ['query' => $query,  'sortBy' => $column, 'orderBy' => $order]);
}
