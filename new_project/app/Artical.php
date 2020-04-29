<?php

namespace App;
use App\Comment;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artical extends Model
{
    use SoftDeletes;
    
    public function category(){
        return $this->belongsTo('App\category');
    }
    public function artical(){
    return $this->belongsTo('App\author');
    }

    public function comment()
    {
        return $this->hasMany('App\comment');
    }


}
