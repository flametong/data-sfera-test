<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Carbon\Carbon;

class StocksController extends Controller
{
    public function index()
    {
        $service = new ApiService();

        $currentDate = Carbon::now()->format('Y-m-d');

        $result = $service->fetchAndInsertData(
            collection: 'stocks', 
            dateFrom:   $currentDate
        );

        if ($result) {
            return response([
                'status'  => 'success',
                'message' => 'The records in the database have been created'
            ]);
        } else {
            return response([
                'status'  => 'error',
                'message' => 'API request error has occured'
            ]);
        }
    }
}
