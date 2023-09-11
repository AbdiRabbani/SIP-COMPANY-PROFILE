<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionPartner extends Model
{
    protected $table = 'solution_setting';
    protected $guarded = [];

    public function partner()
    {
        return $this->belongsTo('App\PartnershipCategory', 'id_partnership_section');
    }
}
