<?php

namespace App\Services\Handlers;

use App\Models\Sale;

class SalesCollectionHandler implements CollectionHandler
{
    public function handle(array $data): void
    {
        Sale::insert($data);
    }
}
