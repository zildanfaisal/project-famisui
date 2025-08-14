<?php

namespace App\Helpers;

class PhoneHelper
{
    public static function formatToWhatsApp($phone)
    {
        // Hilangkan semua spasi, tanda, dan simbol
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Jika nomor mulai dengan 0, ganti jadi 62
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        // Jika nomor mulai dengan +62, hilangkan +
        if (substr($phone, 0, 3) === '062') {
            $phone = '62' . substr($phone, 3);
        }

        if (substr($phone, 0, 1) === '+') {
            $phone = substr($phone, 1);
        }

        // Pastikan diawali dengan 62
        if (!str_starts_with($phone, '62')) {
            $phone = '62' . $phone;
        }

        return $phone;
    }
}
