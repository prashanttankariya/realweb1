<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'title','user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
