<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Post extends Model
{
	protected $fillable = [
 			'title','featured','category_id','content'
 		];

 	

 	public function getFeaturedAttribute($featured){

 		return asset($featured);

 	}

 	public function categories(){
 		
	    // return $this->belongsToMany(Category::class,'category_post','category_id','post_id');
	    return $this->belongsToMany(Category::class);
	}
 
}
