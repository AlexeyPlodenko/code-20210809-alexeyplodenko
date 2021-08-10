<?php

namespace App\Services;

class ResponseService extends AbstractService
{
    /**
     * @param array|null $response
     * @param int $status
     *
     * @return object
     */
    public function respond(array $response = null, int $status = 200): object
    {
        $finalResponse = [
            'status' => $status >= 200 && $status < 300,
        ];
        if ($response) {
            $finalResponse['response'] = $response;
        }

        return response($finalResponse, $status);
    }
}
