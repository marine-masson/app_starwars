<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'quantity','product_id'
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function setCommandAtAttribute($value){
        $this->attributes['commanded_at'] = Carbon('now');
    }
}
