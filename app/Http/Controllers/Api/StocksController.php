<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Services\ApiService;
use Carbon\Carbon;

class StocksController extends Controller
{
    public function index()
    {
        $service = new ApiService();

        $collection  = 'stocks';
        $page        = 1;
        $currentDate = Carbon::now()->format('Y-m-d');

        do {
            $json = $service->fetchJson(
                collection: $collection,
                page:       $page,
                dateFrom:   $currentDate
            );

            if (!$json) {
                return response([
                    'status'  => 'error',
                    'message' => 'API request error has occured'
                ]);
            }

            $lastPage = $json['meta']['last_page'];
            $stocks   = $json['data'];

            Stock::insert($stocks);
            
            $page++;
        } while ($page <= $lastPage);

        return response([
            'status'  => 'success',
            'message' => 'The records in the database have been created'
        ]);
    }
}
