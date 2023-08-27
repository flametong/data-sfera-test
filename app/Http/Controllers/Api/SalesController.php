<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Services\ApiService;

class SalesController extends Controller
{
    public function index()
    {
        $service = new ApiService();
        
        $collection = 'sales';
        $page       = 1;

        do {
            $json = $service->fetchJson(
                collection: $collection,
                page:       $page
            );

            if (!$json) {
                return response([
                    'status'  => 'error',
                    'message' => 'API request error has occured'
                ]);
            }

            $lastPage = $json['meta']['last_page'];
            $sales    = $json['data'];

            Sale::insert($sales);
            
            $page++;
        } while ($page <= $lastPage);

        return response([
            'status'  => 'success',
            'message' => 'The records in the database have been created'
        ]);
    }
}
