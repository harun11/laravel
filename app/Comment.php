<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
      'komentar','post_id','user_id'
    ];

    public function post(){
      return $this->BelongsTo('App\Post');
    }

    public function user(){
      return $this->BelongsTo('App\User');
    }
}
