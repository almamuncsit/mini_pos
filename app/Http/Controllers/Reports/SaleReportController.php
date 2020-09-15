<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\SaleItem;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['main_manu']    = 'Reports';
        $this->data['sub_manu']     = 'Sales';
    }

    public function index( Request $request )
    {
    	$this->data['start_date'] 	= $request->get('start_date', date('Y-m-d'));
    	$this->data['end_date'] 	= $request->get('end_date', date('Y-m-d'));

    	$this->data['sales'] = SaleItem::select( 'sale_items.quantity', 'sale_items.price', 'sale_items.total', 'products.title',  'sale_invoices.challan_no', 'sale_invoices.date')
								    	->join('products', 'sale_items.product_id', '=', 'products.id')
								    	->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id')
								    	->whereBetween('sale_invoices.date', [ $this->data['start_date'], $this->data['end_date'] ])
								    	->get();

    	return view('reports.sales', $this->data);
    }
}
