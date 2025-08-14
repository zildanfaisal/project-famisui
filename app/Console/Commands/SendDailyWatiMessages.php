<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SendDailyWatiMessages extends Command
{
    protected $signature = 'wati:send-messages';
    protected $description = 'Kirim pesan otomatis ke user baru selama 7 hari berturut-turut';

    public function handle()
    {
        $now = Carbon::now();

        // $users = User::where('role', 'user')->get();

        // foreach ($users as $user) {
        //     $daysSinceRegistration = $now->diffInDays($user->created_at);

        //     if ($daysSinceRegistration >= 0 && $daysSinceRegistration <= 6) {
        //         $dayNumber = $daysSinceRegistration + 1; // hari ke-1 sampai 7

        //     // ambil pesan sesuai hari
        //     $message = "Pesan otomatis hari ke-{$dayNumber} untuk {$user->name}";

        //     // kirim ke WATI
        //     $this->sendWatiMessage($user->phone, $message);

        //     }
        // }

        $users = User::where('role', 'user')
            ->whereDate('created_at', $now->toDateString())
            ->get();

        foreach ($users as $user) {
            $message = "Halo {$user->name}, ini pesan otomatis untuk user yang baru daftar.";
            $this->sendWatiMessage($user->phone, $message);
        }
    }

    private function sendWatiMessage($phone, $message)
    {
        $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiJkMjBiZDhmNy0xZWMzLTRhZTMtYjQxNi1kMzNmZjE5NTgxOWIiLCJ1bmlxdWVfbmFtZSI6ImFsZmFudHNhbGl0czJAZ21haWwuY29tIiwibmFtZWlkIjoiYWxmYW50c2FsaXRzMkBnbWFpbC5jb20iLCJlbWFpbCI6ImFsZmFudHNhbGl0czJAZ21haWwuY29tIiwiYXV0aF90aW1lIjoiMDgvMTQvMjAyNSAxMjozNDozNSIsImRiX25hbWUiOiJ3YXRpX2FwcF90cmlhbCIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6IlRSSUFMIiwiZXhwIjoxNzU1ODIwODAwLCJpc3MiOiJDbGFyZV9BSSIsImF1ZCI6IkNsYXJlX0FJIn0.WiJJnyjTXMta-Qdy_LPbUdtiDW4VxseF8QUn822ECjY';
        $apiUrl = 'https://app-server.wati.io/api/v1/getContacts';

        Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->post($apiUrl, [
            'phone' => $phone,
            'messageText' => $message,
            'messageType' => 'text',
        ]);
    }
}