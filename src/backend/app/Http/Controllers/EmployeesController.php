<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class EmployeesController extends Controller
{
    /**
     * @return object
     */
    public function index(): object
    {
        return respond(['error' => 'Not implemented'], 501);
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
