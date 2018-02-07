<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    public function creator(){

        return $this->belongsTo(User::class , 'user_id');

    }
    public function thread(){
        return $this->belongsTo(Thread::class , 'thread_id');
    }
}
