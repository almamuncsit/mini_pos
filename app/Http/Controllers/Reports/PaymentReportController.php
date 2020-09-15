<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->data['main_manu']    = 'Reports';
        $this->data['sub_manu']     = 'Payments';
    }

    public function index(Request $request)
    {
    	$this->data['start_date'] 	= $request->get('start_date', date('Y-m-d'));
    	$this->data['end_date'] 	= $request->get('end_date', date('Y-m-d'));

    	$this->data['payments'] = Payment::whereBetween('date', [ $this->data['start_date'], $this->data['end_date'] ])
								    	->get();

    	return view('reports.payments', $this->data);
    }
}
