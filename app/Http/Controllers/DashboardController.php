<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $summary = Cache::remember('dashboard.summary', 3600, function(){
            return [
                'users' => [
                    'total' => User::count(),
                    'active' => User::where('status', UserStatus::actv())->count(),
                    'inactive' => User::where('status', UserStatus::iactv())->count(),
                    'customers' => User::where('type', UserType::cus())->count(),
                ],
                'orders' => [
                    'total' => Order::count(),
                    'accepted' => Order::where('status', OrderStatus::accepted())->count(),
                    'pending' => Order::where('status', OrderStatus::pending())->count(),
                    'cancelled' => Order::where('status', OrderStatus::cancelled())->count(),
                    'delivering' => Order::where('status', OrderStatus::delivering())->count(),
                    'delivered' => Order::where('status', OrderStatus::delivered())->count(),
                ],
            ];
        });

        $summary = json_decode(json_encode($summary));

        return view('admin.dashboard', compact('summary'));
    }
}
