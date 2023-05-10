<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\StudentNameUpdate;
use App\Events\PurchaseSuccessful;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\StoreSudentPreviousName;
use App\Listeners\UpdateInventoryAfterPurchase;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        StudentNameUpdate::class => [
            StoreSudentPreviousName::class,
        ],

        PurchaseSuccessful::class => [
            UpdateInventoryAfterPurchase::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
