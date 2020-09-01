<?php

namespace App;

use App\PurchaseInvoice;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['group_id', 'name', 'phone', 'email', 'address'];

    public function group()
    {
    	return $this->belongsTo(Group::class);
    }

    public function sales()
    {
    	return $this->hasMany(SaleInvoice::class);
    }


    public function purchases()
    {
    	return $this->hasMany(PurchaseInvoice::class);
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

}
