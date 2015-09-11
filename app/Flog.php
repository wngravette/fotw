<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flog extends Model
{
    protected $table = 'flogs';

    protected $fillable = ['name', 'reason'];
}
