<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $fillable = ['date', 'challan_no', 'note', 'user_id', 'admin_id'];

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function items()
    {
    	return $this->hasMany(SaleItem::class);
    }

    public function receipts()
    {
    	return $this->hasMany(Receipt::class);
    }
    
}
