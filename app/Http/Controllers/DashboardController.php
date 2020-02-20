<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use App\User;

class DashboardController extends Controller
{
	
    public function index(Product $product , Categories $category){

    	return view('Admin.dashboard', compact('product','category'));
    }
}
