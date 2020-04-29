<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function artical()
    {
        return $this->belongsTo('App\Artical');
    }
}
