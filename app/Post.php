<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $quarded = ['id'];
    protected $fillable = ['title', 'body', 'user_id'];
    
}
