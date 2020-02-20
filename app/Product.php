<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['title','category_id','image'];

    public function category(){
    	return $this->belongsTo(Categories::class,'category_id');
    }
    // public function getTagsIdsAttribute()
    // {
    //     return $this->tags->pluck('id')->toArray();
    // }
}
