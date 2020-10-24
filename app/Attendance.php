<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];

    protected $dates = ['check_in', 'check_out'];

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
