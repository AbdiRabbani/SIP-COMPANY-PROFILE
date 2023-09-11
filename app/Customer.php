<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $guarded = [];

    public function category() 
    {
        return $this->belongsTo('App\Customercategory', 'id_category');
    }
}
