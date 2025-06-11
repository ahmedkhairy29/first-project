<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Get all users (you can add pagination later)
        $users = User::all();

        return response()->json([
            'status' => true,
            'users' => $users
        ]);
    }
}
