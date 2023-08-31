<?php

namespace App\Services\Handlers;

use App\Models\Stock;

class StocksCollectionHandler implements CollectionHandler
{
    public function handle(array $data): void
    {
        Stock::insert($data);
    }
}
