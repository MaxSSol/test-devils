<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function index(Request $request)
    {
        if (!$request->has('role')) {
            return response()->json(['error' => 'role parameter is required.'], 400);
        }

        return $this->userService->getUserByRole($request->get('role'));
    }
}
