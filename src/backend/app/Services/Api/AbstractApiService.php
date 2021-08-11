<?php

namespace App\Services\Api;

use App\Services\AbstractService;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class AbstractApiService extends AbstractService
{
    /**
     * @param string $url
     * @param array|string|null $query
     *
     * @return Response
     */
    protected function get(string $url, $query = null): Response
    {
        return Http::get($url, $query);
    }
}
