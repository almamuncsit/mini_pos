<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Product;
use App\PurchaseInvoice;
use App\PurchaseItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserPurchasesController extends Controller
{
    public function __construct()
	{
        parent::__construct();
		$this->data['tab_menu'] = 'purchases';
	}

    /**
     * Purchase list of a user
     * @param  User $id
     */
    public function index( $id )
    {
    	$this->data['user'] 	= User::findOrFail($id);

    	return view('users.purchases.purchases', $this->data);
    }


    /**
     * Create new invoice for purchase
     * @param  InvoiceRequest $request
     * @param  User         $user_id
     */
    public function createInvoice(InvoiceRequest $request, $user_id)
    {
    	$formData 				= $request->all();
    	$formData['user_id'] 	= $user_id;
    	$formData['admin_id'] 	= Auth::id();

    	$invoice = PurchaseInvoice::create($formData);
        
        return redirect()->route( 'user.purchases.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice->id] );
    }

    /**
     * A single invoice 
     * @param  User $user_id  
     * @param  PurchaseInvoice $invoice_id
     */
    public function invoice($user_id, $invoice_id)
    {
        $this->data['user']         = User::findOrFail($user_id);
        $this->data['invoice']      = PurchaseInvoice::findOrFail($invoice_id);
        $this->data['totalPayable'] = $this->data['invoice']->items()->sum('total');
        $this->data['totalPaid']    = $this->data['invoice']->payments()->sum('amount');
        $this->data['products']     = Product::arrayForSelect();

        return view('users.purchases.invoice', $this->data);
    }


    /**
     * Add item to purchase invoice
     * @param InvoiceProductRequest $request 
     * @param User                $user_id 
     * @param PurchaseInvoice     $invoice_id
     */
    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {
        $formData 							= $request->all();
        $formData['purchase_invoice_id'] 	= $invoice_id;

        if( PurchaseItem::create($formData) ) {
            Session::flash('message', 'Item Added Successfully');
        }
        
        return redirect()->route( 'user.purchases.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }


    /**
     * Delete a item form purchase invoice
     * @param  User             $user_id 
     * @param  PurchaseInvoice  $invoice_id
     * @param  PurchaseItem     $item_id
     */
    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if( PurchaseItem::destroy( $item_id ) ) {
            Session::flash('message', 'Item Deleted Successfully');   
        }

        return redirect()->route( 'user.purchases.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }

    /**
     * Delete a purchase invoice
     * @param  User             $user_id 
     * @param  PurchaseInvoice  $invoice_id
     */
    public function destroy($user_id, $invoice_id)
    {
        if( PurchaseInvoice::destroy($invoice_id) ) {
            Session::flash('message', 'Invoice Deleted Successfully');
        }

        return redirect()->route( 'user.purchases', ['id' => $user_id] );
    }


}
