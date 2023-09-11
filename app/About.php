<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    protected $guarded = [];

    public function insights()
    {
        return $this->belongsTo('App\Insights', 'id_insights');
    }
}
