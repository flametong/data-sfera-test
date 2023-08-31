<?php

namespace App\Services\Handlers;

use App\Models\Order;

class OrdersCollectionHandler implements CollectionHandler
{
    public function handle(array $data): void
    {
        Order::insert($data);
    }
}
