<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\UserOrderedItems::class => [
            \App\Listeners\UpdateRemoveItemsInStock::class // Quando o usuário confirmar o pedido atualizar removendo a quantidade do estoque
        ],
        \App\Events\UserCancelledOrderItems::class => [
            \App\Listeners\UpdateAddingBackItemsInStock::class // Quando o usuário cancelar o pedido atualizar devolver a quantidade ao estoque
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
}
