<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['date', 'amount', 'note', 'user_id', 'admin_id', 'purchase_invoice_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

}
