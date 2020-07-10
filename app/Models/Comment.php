<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = ['text'];



    public function posts()
    {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');

    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
