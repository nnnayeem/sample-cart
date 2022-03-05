<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function customers()
    {
        $customers = User::where('type', UserType::cus())->get();

        return view('admin.customers.index', compact('customers'));
    }
}
