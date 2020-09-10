<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = ['date', 'amount', 'note', 'user_id', 'admin_id', 'sale_invoice_id'];

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

	public function invoice()
    {
    	return $this->belongsTo(SaleInvoice::class);
    }    
}
