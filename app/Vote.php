<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function flog()
    {
        return $this->belongsTo('App\Flog');
    }

    public function scopeUpvotes($query)
    {
        return $query->where('vote_direction', '1');
    }
}
