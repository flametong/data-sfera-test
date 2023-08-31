<?php

namespace App\Services\Handlers;

use App\Models\Income;

class IncomesCollectionHandler implements CollectionHandler
{
    public function handle(array $data): void
    {
        Income::insert($data);
    }
}
