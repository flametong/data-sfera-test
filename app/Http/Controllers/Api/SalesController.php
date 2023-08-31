<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiService;

class SalesController extends Controller
{
    public function index()
    {
        $service = new ApiService();

        $result = $service->fetchAndInsertData('sales');
        
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
