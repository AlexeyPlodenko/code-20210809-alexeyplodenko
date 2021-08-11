<?php

namespace App\Http\Controllers;

use App\Exceptions\Services\Api\InvalidResponseStructureException;
use App\Services\Api\SomehostNetApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EmployeesController extends Controller
{
    /**
     * @return object
     */
    public function index(): object
    {
        /** @var SomehostNetApiService $somehostNet */
        $somehostNet = App::make(SomehostNetApiService::class);
        try {
            $employees = $somehostNet->getList();
        } catch (InvalidResponseStructureException $ex) {
            return respond([], 500);
        }
        return respond($employees);
    }

    /**
     * @param int $userId
     *
     * @return object
     */
    public function show(int $userId): object
    {
        return respond(['error' => 'Not implemented'], 501);
    }

    /**
     * @param int $userId
     * @param Request $req
     *
     * @return object
     */
    public function update(int $userId, Request $req): object
    {
        return respond(['error' => 'Not implemented'], 501);
    }

    /**
     * @param int $userId
     *
     * @return object
     */
    public function destroy(int $userId): object
    {
        return respond(['error' => 'Not implemented'], 501);
    }

    /**
     * @param Request $req
     *
     * @return object
     */
    public function store(Request $req): object
    {
        return respond(['error' => 'Not implemented'], 501);
    }
}
