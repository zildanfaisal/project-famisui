<?php

return [
    'required' => ':attribute wajib diisi.',
    // 'phone' => 'Nomor tidak valid.', #Error Massage langsung pada validation.php
    'email' => 'Format email tidak valid',
    'unique' => 'Email telah terdaftar, gunakan email lain.',
    'confirmed' => 'Konfirmasi password tidak cocok.',
    'min' => [
        'string' => 'Password terlalu singkat, minimal :min karakter.',
    ],
    'regex' => 'Harap gunakan gmail.com',
];
