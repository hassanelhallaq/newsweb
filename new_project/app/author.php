<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class author extends Authenticatable
{
    public function author(){
    return $this->hasMany('App\artical');
}
public function category(){
    return $this->belongsToMany('App\category');
}
}
