<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectReference extends Model
{
    protected $table = 'project_reference';
    protected $guarded = [];

    public function partner_section()
    {
        return $this->belongsTo('App\PartnershipCategory','id_product');
    }
}
