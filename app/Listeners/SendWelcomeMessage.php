<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeMessage
{
    public function handle(Registered $event)
    {
        $user = $event->user;

        // Pesan hari pertama
        $message = "Halo Ibu Hebat!\n\nTerima kasih sudah berkunjung ke lactacare.id.\n\nMenyusui adalah bahasa pertama kasih sayang antara ibu dan bayi...";

        Http::post('https://api.watzap.id/v1/send_message', [
            'api_key'     => config('services.watzap.api_key'),
            'number_key'  => config('services.watzap.number_key'),
            'phone_no'    => $user->phone,
            'message'     => $message,
            'wait_until_send' => 1,
        ]);
    }
}
