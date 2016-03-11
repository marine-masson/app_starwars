<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Product extends Model
{
    protected $fillable=[
        'category_id','title','abstract','content','status','price','quantity','published_at'
    ];
    protected $storage;

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function picture(){
        return $this->hasOne('App\Picture');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function setSlugAttribute($value){
        $this->attributes['slug'] = (empty($value)) ? str_slug($this->title) : str_slug($value);
    }
    public function setPublishedAtAttribute($value){
        if(!empty($value)){
            $this->attributes['published_at'] = Carbon\Carbon::now();
        }

    }
    public function hasTag($id){

        foreach($this->tags as $tag){
            if($tag->id == $id) return true;
        }

        return false;
    }
    public function getTitleAttribute($value){
        return ucfirst($value);
    }
    public function restoreProduct($id){

    }
}
