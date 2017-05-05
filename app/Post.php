<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'text','user_id'
    ];

    public function comments(){
        return  $this->hasMany('App\Comment');
    }

    public function user(){
      return $this->BelongsTo('App\User');
    }
}
