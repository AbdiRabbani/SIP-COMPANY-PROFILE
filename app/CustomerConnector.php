<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerConnector extends Model
{
    protected $table = 'customer_connector';
    protected $guarded = [];

    public function partner_section() 
    {
        return $this->belongsTo('App\Partnershipcategory', 'id_product');
    }
}
