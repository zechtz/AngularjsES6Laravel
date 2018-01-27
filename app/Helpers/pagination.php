<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

/**
 * Generates pagination of items for an array or an eloquent collection.
 * by default, you can't call paginate on an array, only works on collections
 * this function solves that.
 * url: https://laravel.com/docs/5.4/pagination
 *
 * @param array|Collection $items
 * @param int   $perPage
 * @param int   $page
 * @param array $options
 *
 * @return LengthAwarePaginator
 */

if (!function_exists('customPaginate')) {
    function customPaginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page  = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
