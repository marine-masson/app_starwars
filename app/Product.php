<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'category_id','title','abstract','content','status','price','quantity','published_at'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function picture(){
        return $this->hasOne('App\Picture');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
