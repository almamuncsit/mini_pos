<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['group_id', 'name', 'phone', 'email', 'address'];

    public function group()
    {
    	return $this->belongsTo(Group::class);
    }

}
