<?php

use App\Broadcasting\NewUserRegisteredChannel;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('new_user_registered_channel', NewUserRegisteredChannel::class);

Broadcast::channel('online_admins_channel', function($admin) {
    if($admin->type == 'super_admin')
    return $admin;
}, ['guards' => ['admin']]);


