<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Receipt;
use Illuminate\Http\Request;

class ReceiptReportController extends Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->data['main_manu']    = 'Reports';
        $this->data['sub_manu']     = 'Receipts';
    }

    public function index(Request $request)
    {
    	$this->data['start_date'] 	= $request->get('start_date', date('Y-m-d'));
    	$this->data['end_date'] 	= $request->get('end_date', date('Y-m-d'));

    	$this->data['receipts'] = Receipt::whereBetween('date', [ $this->data['start_date'], $this->data['end_date'] ])
								    	->get();

    	return view('reports.receipts', $this->data);
    }
}
