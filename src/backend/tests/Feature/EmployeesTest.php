<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var string
     */
    protected string $testDataJson = '[
        {
            "id": 1, "first_name": "Aviva", "last_name": "Pryde", "email": "apryde0@cbsnews.com",
            "phone": "873-134-6659", "timezone": "Pacific/Pago_Pago"
        },
        {
            "id": 2, "first_name": "William", "last_name": "Clancy", "email": "wclancy1@slate.com",
            "phone": "995-708-1606", "timezone": "Europe/Athens"
        }
    ]';

    /**
     * @return void
     */
    public function test_get()
    {
        DB::table('employees')->insert([
            'data' => $this->testDataJson
        ]);

        $resp = $this->get('/employees');

        $resp->assertStatus(200);

        $testData = json_decode($this->testDataJson, true);
        $resp->assertJson([
            'status' => true,
            'response' => [$testData]
        ]);
    }

    /**
     * @return void
     */
    public function test_post()
    {
        $testData = json_decode($this->testDataJson, true);

        $resp = $this->json('POST', '/employees', $testData);
        $resp->assertStatus(200);
        $resp->assertJson([
            'status' => true
        ]);

        // sorting test data, so the order of the keys would match with the response
        foreach ($testData as &$testItem) {
            ksort($testItem);
            $testItem = json_encode($testItem);
        }
        unset($testItem);

        $employees = DB::table('employees')->get();
        foreach ($employees as $employee) {
            $employeesData = json_decode($employee->data, true);
            ksort($employeesData);
            $employeesDataJson = json_encode($employeesData);

            $pos = array_search($employeesDataJson, $testData);
            if ($pos === false) {
                // if the JSON string does not exist in the initial set, bail out immediately
                $this->fail();
            }
            unset($testData[$pos]);
        }

        // the array should not contain any elements after checking
        $this->assertEmpty($testData);
    }
}
