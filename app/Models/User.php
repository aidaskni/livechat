<?php

namespace App\Models;

use Aidaskni\Supportchat\Models\Message;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function supportMessages()
    {
        return $this->hasMany(Message::class, 'support_id', 'id');
    }

    public function clientMessages()
    {
        return $this->hasMany(Message::class, 'client_id', 'id');
    }

    public function userMessages()
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }
}
