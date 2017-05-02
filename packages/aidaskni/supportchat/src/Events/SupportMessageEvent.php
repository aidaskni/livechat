<?php

namespace Aidaskni\Supportchat\Events;

use Aidas\Supportchat\Models\Conversation;
use Aidas\Supportchat\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class SupportMessageEvent
 * @package Aidas\Supportchat\Events
 */
class SupportMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var User */
    public $user;

    /** @var Message */
    public $message;

    /** @var Conversation */
    public $conversation;

    /**
     * MessageEvent constructor.
     * @param Conversation $conversation
     * @param Message $message
     * @param User $user
     */
    public function __construct(Conversation $conversation, Message $message, User $user)
    {
        $this->message = $message;
        $this->user = $user;
        $this->conversation = $conversation;
    }

    /**
     * @return PresenceChannel
     */
    public function broadcastOn()
    {
        return new PresenceChannel('supportchat-' . $this->conversation->id);
    }
}
