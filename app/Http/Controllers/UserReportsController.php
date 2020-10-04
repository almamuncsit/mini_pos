<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PurchaseItem;
use App\Receipt;
use App\SaleItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserReportsController extends Controller
{
    public function reports( $id )
    {
        $this->data['tab_menu'] = 'reports';
        $this->data['user']     = User::findOrFail($id);

        $this->data['sales'] = SaleItem::select( 'products.title', DB::raw( 'SUM(sale_items.quantity) as quantity, AVG(sale_items.price) AS price, SUM(sale_items.total) as total') )
                                        ->join('products', 'sale_items.product_id', '=', 'products.id')
                                        ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id')
                                        ->where('products.has_stock', 1)
                                        ->where('sale_invoices.user_id', $id)
                                        ->groupBy(['products.id', 'products.title'])
                                        ->get();

        $this->data['purchases'] = PurchaseItem::select( 'products.title', DB::raw( 'SUM(purchase_items.quantity) as quantity, AVG(purchase_items.price) AS price, SUM(purchase_items.total) as total') )
                                        ->join('products', 'purchase_items.product_id', '=', 'products.id')
                                        ->join('purchase_invoices', 'purchase_items.purchase_invoice_id', '=', 'purchase_invoices.id')
                                        ->where('products.has_stock', 1)
                                        ->where('purchase_invoices.user_id', $id)
                                        ->groupBy(['products.id', 'products.title'])
                                        ->get();

		$this->data['receipts'] = Receipt::select('date', DB::raw('SUM(amount) as amount') )
        								->groupBy('date')
        								->where('user_id', $id)
								    	->get();   
		
		$this->data['payments'] = Payment::select('date', DB::raw('SUM(amount) as amount') )
        								->groupBy('date')
        								->where('user_id', $id)
								    	->get();   

        return view('users.reports.reports', $this->data);   
    }
}
