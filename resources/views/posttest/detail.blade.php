<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LactaCare | Detail Post-Test</title>
    <link rel="stylesheet" href="{{ asset('css/posttest-detail.css') }}">
</head>
<body>
<div class="container">
    <header class="page-header">
        <div class="left">
            <a
                href="{{ route('admin.users.detail-records', $posttest->user->id) }}"
                class="btn-primary"
                aria-label="Lihat detail rekam user"
            >
                ← Kembali
            </a>
        </div>
        <h2 class="title">Detail Post-Test</h2>
        <div class="right"><!-- spacer untuk menjaga h2 tetap center --></div>
    </header>

    <hr class="divider">

    <div class="detail">
        <p><strong>Nama:</strong> {{ $posttest->user->name }}</p>
        <p><strong>No. Telp:</strong> {{ $posttest->user->phone }}</p>
        <p><strong>Video Ditonton:</strong> {{ $posttest->video->title }}</p>
        <p><strong>Skor:</strong> {{ $posttest->skor }}</p>

        <p>
            <strong>Berapa kali Anda menyusui bayi Anda secara langsung (bukan ASI perah) kemarin? Jika belum menyusui sama sekali isikan “0”</strong><br>
            {{ $posttest->intensitas_menyusui }} kali
        </p>

        <p>
            <strong>Apakah kemarin bayi Anda diberi susu formula atau makanan lain?</strong><br>
            {{ $posttest->susu_formula ? 'Ya' : 'Tidak' }}
        </p>

        @php
            // Pastikan "perawatan" aman dipakai meskipun tersimpan sebagai JSON/string/nullable
            $perawatanRaw = $posttest->perawatan ?? [];
            $perawatan = is_array($perawatanRaw)
                ? $perawatanRaw
                : (is_string($perawatanRaw) ? json_decode($perawatanRaw, true) : []);
            if (!is_array($perawatan)) $perawatan = [];
        @endphp
        <p>
            <strong>Pilih jenis perawatan bayi yang telah Anda lakukan secara mandiri kemarin? Anda bisa memilih lebih dari satu perawatan</strong><br>
            {{ !empty($perawatan) ? implode(', ', $perawatan) : '-' }}
        </p>

        <p>
            <strong>Apakah Anda mengalami kendala dalam menyusui bayi Anda? Tuliskan kendala Anda</strong><br>
            {{ $posttest->kendala_menyusui ?? '-' }}
        </p>

        <p>
            <strong>Apakah Anda ingin melakukan konsultasi terkait kendala menyusui yang Anda alami?</strong><br>
            {{ $posttest->konsultasi_kendala ? 'Ya' : 'Tidak' }}
        </p>
    </div>
</div>
</body>
</html>