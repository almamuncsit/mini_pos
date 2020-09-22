<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Product;
use App\PurchaseItem;
use App\Receipt;
use App\SaleItem;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->data['main_manu']    = 'Dashboard';
    }


    public function index()
    {
    	$this->data['totalUsers'] 		= User::count('id');
    	$this->data['totalProducts'] 	= Product::count('id');
    	$this->data['totalSales'] 		= SaleItem::sum('total');
    	$this->data['totalPurchases'] 	= PurchaseItem::sum('total');
    	$this->data['totalReceipts'] 	= Receipt::sum('amount');
    	$this->data['totalPayments'] 	= Payment::sum('amount');
    	$this->data['totalStock'] 		= PurchaseItem::sum('quantity') - SaleItem::sum('quantity');

    	return view('dashboard', $this->data);
    }
}
