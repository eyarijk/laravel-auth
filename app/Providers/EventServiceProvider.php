<?php

namespace App\Providers;

use App\Listeners\UserRegistrationLogListener;
use App\Listeners\VerifySendMailListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            VerifySendMailListener::class,
            UserRegistrationLogListener::class,
        ],
    ];
}
