<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        if ($settings['mail_host']) {
            config([
                'mail.mailers.smtp' => [
                    'transport' => 'smtp',
                    'host' => $settings['mail_host'],
                    'port' => $settings['mail_port'],
                    'username' => $settings['mail_username'],
                    'password' => $settings['mail_password'],
                    'timeout' => null,
                    'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
                ],
                'mail.from.address' => $settings['mail_username']
            ]);
        }
    }
}
