<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    private string $protocol = 'http://';
    private string $host     = '89.108.115.241';
    private string $port     = '6969';

    public function fetchJson(
        string $collection,
        string $dateFrom = '2023-01-01',
        string $dateTo   = '2024-01-01',
        int    $page     = 1,
        int    $limit    = 500,
    ): mixed
    {
        $uri =  $this->protocol .
                $this->host     .
                ':'             .
                $this->port     .
                '/api/'         .
                $collection;

        return Http::get(
            $uri,
            [
                'dateFrom' => $dateFrom,
                'dateTo'   => $dateTo,
                'page'     => $page,
                'key'      => config('app.tokens.secret_token'),
                'limit'    => $limit,
            ]
        )->json();
    }
}
