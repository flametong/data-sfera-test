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
        string $dateFrom,
        string $dateTo,
        int    $page,
        int    $limit,
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

    public function fetchAndInsertData(
        string $collection,
        string $dateFrom = '2023-01-01',
        string $dateTo   = '2024-01-01',
        int    $page     = 1,
        int    $limit    = 500,
    ): bool
    {        
        do {
            $json = $this->fetchJson(
                $collection, 
                $dateFrom, 
                $dateTo, 
                $page, 
                $limit
            );

            if (!$json) {
                return false;
            }

            $lastPage = $json['meta']['last_page'];
            $data     = $json['data'];

            $handlerClassName = $this->getHandlerClassName($collection);
            
            if (!class_exists($handlerClassName)) {
                return false;
            }

            (new $handlerClassName())->handle($data);
            
            $page++;
        } while ($page <= $lastPage);

        return true;
    }

    private function getHandlerClassName(string $collection): string
    {
        return 
            'App\Services\Handlers\\' . 
            ucfirst($collection)      . 
            'CollectionHandler';
    }
}
