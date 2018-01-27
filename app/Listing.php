<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //ADD ONE-TO-MANY RELATIONSHIP
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
