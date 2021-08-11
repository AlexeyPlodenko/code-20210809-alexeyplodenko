<?php

namespace App\Services\Api;

use App\Exceptions\Services\Api\InvalidResponseStructureException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SomehostNetApiService extends AbstractApiService
{
    /**
     * @var string
     */
    protected string $schemeHost = 'https://www.somehost.net';

    /**
     * @return array
     * @throws InvalidResponseStructureException
     */
    public function getList(): array
    {
        $resp = $this->get($this->schemeHost .'/employees');
        $employees = $resp->json();
        if (!$this->isEmployeesValid($employees)) {
            throw new InvalidResponseStructureException;
        }

        return $employees;
    }

    /**
     * @TODO implement as data guard. The existing package matt-allan/illuminate-json-guard does not work in this L version
     *
     * @param mixed $employees
     *
     * @return bool
     */
    protected function isEmployeesValid($employees): bool
    {
        return is_array($employees)
               && !array_filter($employees, function($item) {
                return !(
                    is_array($item)
                    && isset($item['id'], $item['first_name'], $item['last_name'],
                        $item['email'], $item['phone'], $item['timezone']) // all items are in place
                    && count($item) === 6 // check for no extra parameters passed
                    && is_scalar($item['id']) // items are of valid type
                    && ctype_digit((string)$item['id'])
                    && is_string($item['first_name'])
                    && is_string($item['last_name'])
                    && is_string($item['email'])
                    && is_string($item['phone'])
                    && is_string($item['timezone'])
                    // here we can also check if they are not empty, email format and time zone validity
                );
            });
    }

    /**
     * A temp. method overload to stub the behavior. Just remove it, to use the actual get() method.
     *
     * @param string $url
     * @param array|string|null $query
     *
     * @return Response
     */
    protected function get(string $url, $query = null): Response
    {
        $resp = require_once __DIR__ .'/somehostNetEmployeesGetResponseMock.php';
        Http::fake([
            'www.somehost.net/*' => Http::response($resp),
        ]);

        return parent::get($url, $query);
    }
}
