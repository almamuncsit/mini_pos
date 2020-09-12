<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    protected $fillable = ['date', 'challan_no', 'note', 'user_id', 'admin_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function items()
    {
    	return $this->hasMany(PurchaseItem::class);
    }

    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }
}
