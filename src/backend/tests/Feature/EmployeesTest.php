<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    /**
     * @return void
     */
    public function test_get()
    {
        $resp = $this->get('/employees');

        $resp->assertStatus(200);

        $testData = require_once __DIR__ .'/../../app/Services/Api/somehostNetEmployeesGetResponseMock.php';
        $resp->assertJson([
            'status' => true,
            'response' => [$testData]
        ]);
    }
}
