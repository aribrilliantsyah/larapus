<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
     protected $fillable=['title','author_id','anmount'];
     public function author()
     {
     	return $this->belongsTo('App\Author');
     }
}