<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [

      'category_id',
      'photo_id',
      'title',
      'body'


    ];

    public function user(){

      // grab table user joining them
      return $this->belongsTo('App\User');



    }

    public function photo(){

      // grab table user joining them
      return $this->belongsTo('App\Photo');



    }

    public function category(){

      // grab table user joining them
      return $this->belongsTo('App\Category');



    }



}
