<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Services\ApiService;

class IncomesController extends Controller
{
    public function index()
    {
        $service = new ApiService();
        
        $collection = 'incomes';
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
            $incomes  = $json['data'];

            Income::insert($incomes);
            
            $page++;
        } while ($page <= $lastPage);

        return response([
            'status'  => 'success',
            'message' => 'The records in the database have been created'
        ]);
    }
}
