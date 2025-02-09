<?php
namespace App\Providers;
use App\Events\CreateCategoryEvent;
use App\Listeners\CreateCategoryListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event-to-listener mappings for the application.
     */
    protected $listen = [
        CreateCategoryEvent::class => [
            CreateCategoryListener::class,
        ],
    ];

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        parent::boot();
    }

}