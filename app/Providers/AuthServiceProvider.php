<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
                ->subject('Verificar cuenta')
                ->line('Tu cuenta está casi lista, solo debes presionar el enlace a continuacion.')
                ->action('Confirmar cuenta', $url)
                ->line('Si no creaste una cuenta en DevJobs puedes ignorar este mensaje.');

        });
    }
}
