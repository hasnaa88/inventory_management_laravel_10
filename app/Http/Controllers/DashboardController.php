<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;

class DashboardController extends Controller
{


    public function index(){
        $totalProducts = Product::count();
    
        $totalPrice = Product::sum('price');
       // $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalCustomers = Customer::count();


        return view('dashboard', compact('totalProducts', 'totalPrice', 'totalCustomers','totalCategories'));
    }
    
}
