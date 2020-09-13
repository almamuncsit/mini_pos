<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsStockController extends Controller
{
    public function index()
    {
    	$this->data['products'] = Product::all();

    	return view('products.stocks', $this->data);
    }
}
