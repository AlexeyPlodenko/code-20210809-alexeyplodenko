<?php

use App\Services\ResponseService;

/**
 * @param array|null $response
 * @param int $status
 *
 * @return object
 */
function respond(array $response = null, int $status = 200): object
{
    return app(ResponseService::class)->respond($response, $status);
}
