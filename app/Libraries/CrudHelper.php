<?php

namespace App\Libraries;

trait CrudHelper
{
    protected function getSortingInfo(): array
    {
        $per_page  = request('per_page', 10);
        $sort_by   = request('sort_by', 'id');
        $sort_type = request('sort_type', 'asc');

        return [
            $per_page,
            $sort_by,
            $sort_type,
        ];
    }
}
