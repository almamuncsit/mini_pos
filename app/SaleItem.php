<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{

	protected $fillable = [ 'product_id', 'sale_invoice_id', 'price', 'quantity', 'total' ];
    
    public function invoice()
    {
    	return $this->belongsTo(SaleInvoice::class, 'sale_invoice_id', 'id');
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

}
