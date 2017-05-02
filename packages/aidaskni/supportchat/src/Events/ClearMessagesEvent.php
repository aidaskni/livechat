<?php

namespace Aidaskni\Supportchat\Events;

use Aidaskni\Supportchat\Models\Conversation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ClearMessagesEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Conversation */
    public $conversation;

    /**
     * ClearMessagesEvent constructor.
     * @param Conversation $conversation
     */
    public function __construct(Conversation $conversation)
    {
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
