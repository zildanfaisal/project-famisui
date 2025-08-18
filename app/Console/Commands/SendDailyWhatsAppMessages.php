<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class SendDailyWhatsAppMessages extends Command
{
    protected $signature = 'whatsapp:send-daily';
    protected $description = 'Kirim pesan WhatsApp harian ke user baru (7 hari sejak daftar)';

    // Semua User yang terdaftar akan menerima pesan harian selama 7 hari pertama setelah pendaftaran.
    // public function handle()
    // {
    //     $users = User::all();

    //     foreach ($users as $user) {
    //         $days = $user->created_at->diffInDays(now()) + 1; // hitung hari ke berapa
    //         if ($days >= 1 && $days <= 7) {
    //             $messages = [
    //                 1 => "Hari 1: Selamat datang, Bu! Ini materi edukasi pertama untuk ibu hamil...",
    //                 2 => "Hari 2: Tips menjaga pola makan sehat selama kehamilan...",
    //                 3 => "Hari 3: Pentingnya olahraga ringan...",
    //                 4 => "Hari 4: Cara mengurangi stres...",
    //                 5 => "Hari 5: Edukasi tentang pemeriksaan rutin...",
    //                 6 => "Hari 6: Informasi nutrisi tambahan...",
    //                 7 => "Hari 7: Pesan motivasi untuk ibu hamil...",
    //             ];

    //             if (isset($messages[$days])) {
    //                 Http::post('https://api.watzap.id/v1/send_message', [
    //                     'api_key'     => config('services.watzap.api_key'),
    //                     'number_key'  => config('services.watzap.number_key'),
    //                     'phone_no'    => $user->phone,
    //                     'message'     => $messages[$days],
    //                     'wait_until_send' => 1,
    //                 ]);

    //                 $this->info("Pesan hari ke-{$days} dikirim ke {$user->phone}");
    //             }
    //         }
    //     }
    // }
    
    // User terakhir yang mendaftar akan menerima pesan harian selama 7 hari pertama setelah pendaftaran.
    public function handle()
    {
        // Ambil user terakhir yang daftar
        $user = User::latest()->first();

        if (!$user) {
            $this->info("Tidak ada user yang ditemukan.");
            return;
        }

        $days = $user->created_at->diffInDays(now()) + 1; // hitung hari ke berapa

        if ($days >= 1 && $days <= 7) {
            $messages = [
                1 => "Hari 1: Selamat datang, Bu! Ini materi edukasi pertama untuk ibu hamil...",
                2 => "Hari 2: Tips menjaga pola makan sehat selama kehamilan...",
                3 => "Hari 3: Pentingnya olahraga ringan...",
                4 => "Hari 4: Cara mengurangi stres...",
                5 => "Hari 5: Edukasi tentang pemeriksaan rutin...",
                6 => "Hari 6: Informasi nutrisi tambahan...",
                7 => "Hari 7: Pesan motivasi untuk ibu hamil...",
            ];

            if (isset($messages[$days])) {
                Http::post('https://api.watzap.id/v1/send_message', [
                    'api_key'     => config('services.watzap.api_key'),
                    'number_key'  => config('services.watzap.number_key'),
                    'phone_no'    => $user->phone,
                    'message'     => $messages[$days],
                    'wait_until_send' => 1,
                ]);

                $this->info("Pesan hari ke-{$days} dikirim ke {$user->phone}");
            }
        }
    }
}
