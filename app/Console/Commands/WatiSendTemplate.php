<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WatiSendTemplate extends Command
{
    protected $signature = 'wati:send-template {phone} {name=John} {ordernumber=12345}';
    protected $description = 'Kirim template message via WATI API v2';

    public function handle()
    {
        $phone = $this->argument('phone');
        $name = $this->argument('name');
        $orderNumber = $this->argument('ordernumber');

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => env('WATI_INSTANCE_URL') . '/api/v2/sendTemplateMessage?whatsappNumber=' . $phone,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                "template_name" => env('WATI_TEMPLATE'),
                "broadcast_name" => "my_broadcast",
                "parameters" => [
                    [
                        "name" => "name",
                        "value" => $name
                    ],
                    [
                        "name" => "ordernumber",
                        "value" => $orderNumber
                    ]
                ]
            ]),
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . env('WATI_API_KEY'),
                'Content-Type: application/json'
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            $this->error("cURL Error: $err");
        } else {
            $this->info("Response API: " . $response);
        }
    }
}
