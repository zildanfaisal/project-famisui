<?php

namespace App\Helpers;

class PhoneHelper
{
    public static function formatToWhatsApp($phone)
    {
        // Jika dimulai dengan '0', ubah ke +62
        if (strpos($phone, '0') === 0) {
            return '+62' . substr($phone, 1);
        }

        // Jika sudah +62 atau tanpa '0' di awal, return langsung
        return $phone;
    }
}
