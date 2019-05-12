<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    protected $guarded = [];

    public function userSender()
    {
        return $this->belongsTo('App\User','sender_id','id');
    }

    public function userRecipient()
    {
        return $this->belongsTo('App\User','recipient_id','id');
    }
}
