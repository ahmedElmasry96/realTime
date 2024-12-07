<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewUserRegisteredEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    /**
     * Create a new event instance.
     */
    public function __construct(public User $user)
    {
        $this->message = 'New User Registered Called ' . $user->name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('new_user_registered_channel'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'new_user_custom_name';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'message' => $this->message,
        ];
    }

    public function broadcastWhen(): bool
    {
        return $this->user->name == 'Ahmed';
    }
}
