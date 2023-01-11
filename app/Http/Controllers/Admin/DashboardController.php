<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Gender;
use App\Models\Location;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $modals = [
          ['name'=> 'orders', 'total' => Order::count()],
          ['name'=> 'customers', 'total' => Customer::count()],
//          ['name'=> 'verifications', 'total' => Verification::count()],
          ['name'=> 'products', 'total' => Product::count()],
          ['name'=> 'categories', 'total' => Category::count()],
          ['name'=> 'brands', 'total' => Brand::count()],
          ['name'=> 'attributes', 'total' => Attribute::count()],
//          ['name'=> 'locations', 'total' => Location::count()],
//          ['name'=> 'users', 'total' => User::count()],
        ];

        return
            view('admin.dashboard.index')
            ->with([
                'modals' => $modals,
            ]);
    }
}
