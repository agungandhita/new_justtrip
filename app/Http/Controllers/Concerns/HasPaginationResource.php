<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Converts a LengthAwarePaginator into the API Resource format
 * expected by Vue Pagination components:
 * { data, meta, links }
 */
trait HasPaginationResource
{
    protected function paginateToResource(LengthAwarePaginator $paginator): array
    {
        return [
            'data'  => $paginator->items(),
            'meta'  => [
                'current_page' => $paginator->currentPage(),
                'last_page'    => $paginator->lastPage(),
                'per_page'     => $paginator->perPage(),
                'total'        => $paginator->total(),
                'from'         => $paginator->firstItem(),
                'to'           => $paginator->lastItem(),
            ],
            'links' => [
                'prev' => $paginator->previousPageUrl(),
                'next' => $paginator->nextPageUrl(),
            ],
        ];
    }
}
