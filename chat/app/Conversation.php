<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = "public.conversations";
    protected $fillable = ['message']; 
}
