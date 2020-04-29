<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function artical(){
        return $this->hasMany('App\artical');
    }
    public function author(){
        return $this->belongsToMany ('App\author');
    }
}
