<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * @return object
     */
    public function index(): object
    {
        $res = [];

        $employees = DB::table('employees')->get();
        foreach ($employees as $employee) {
            $res[] = json_decode($employee->data, true);
        }

        return respond($res);
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
        $data = $req->json()->all();

        // validate input
        if (!$this->isStoreJsonValid($data)) {
            return respond(['error' => 'Unprocessable Entity'], 422);
        }

        // for performance reason doing in a transaction
        DB::beginTransaction();
        try {
            foreach ($data as $item) {
                $itemJson = json_encode($item);
                DB::table('employees')->insert([
                    'data' => $itemJson
                ]);
            }
            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
        }

        return respond();
    }

    /**
     * @TODO implement as data guard. The existing package matt-allan/illuminate-json-guard does not work in this L version
     *
     * @param mixed $data
     *
     * @return bool
     */
    protected function isStoreJsonValid($data): bool
    {
        return is_array($data)
               && !array_filter($data, function($item) {
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
}
