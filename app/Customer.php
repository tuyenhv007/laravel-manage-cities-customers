<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /* The table associated with the model*/
    protected $table = 'customers';

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
