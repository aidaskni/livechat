<?php

namespace Aidaskni\Supportchat\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Conversation
 * @package Aidas\Supportchat\Models
 */
class Conversation extends Model
{
    /** @var string  */
    protected $table = 'conversations';

    /** @var array  */
    protected $fillable = [
        'title',
        'status',
    ];

    /** @var array  */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id');
    }
}
