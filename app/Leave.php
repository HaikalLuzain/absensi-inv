<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $guarded = [];

    protected $dates = ['absent_from', 'absent_to'];

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
