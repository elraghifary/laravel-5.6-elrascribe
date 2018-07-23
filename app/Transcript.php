<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    protected $fillable = ['project', 'idi', 'date', 'day', 'time', 'moderator', 'criteria', 'body', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
