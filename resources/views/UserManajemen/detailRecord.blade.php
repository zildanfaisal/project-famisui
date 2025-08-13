<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAMISUI | User Manajemen</title>
    <link rel="stylesheet" href="{{ asset('css/detailRecord.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>

    <div class="container-detail">
        <!-- Card 1 -->
        <div class="card">
            <h3>IDENTITAS USER</h3>
            <ul>
                <li><strong>Nama:</strong> {{ $user->name }}</li>
                <li><strong>Usia:</strong> {{ $user->usia }} tahun</li>
                <li><strong>Pendidikan Terakhir:</strong> {{ $user->pendidikan_terakhir }}</li>
                <li><strong>Pekerjaan:</strong> {{ $user->pekerjaan }}</li>
                <li><strong>No. WA:</strong> {{ $user->phone }}</li>
                <li><strong>Sudah melahirkan:</strong> {{ $user->jumlah_melahirkan }} kali</li>
                <li><strong>Periode Postpartum:</strong> {{ $user->periode_postpartum }}</li>
                <li><strong>Jenis Persalinan:</strong> {{ $user->jenis_persalinan }}</li>
                <li><strong>Jenis Kelamin Bayi:</strong> {{ $user->jenis_kelamin_bayi }}</li>
            </ul>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <!-- <h3>Data Tes & Lokasi</h3> -->
            <ul>
                <li><strong>Skor Pre-Test:</strong> {{ $user->pretest->skor ?? '-' }}</li>
                <li><strong>Jumlah Video Dilihat:</strong> {{ $jumlah_video }}</li>
            </ul>
        </div>

        <!-- Card 3, 4, dst -->
        <div class="posttest-wrapper">
            @foreach ($posttests as $index => $pt)
                <div class="card posttest-card">
                    <h4>Post-Test {{ $index + 1 }}</h4>
                    <div class="posttest-content">
                        <div><strong>Skor:</strong> {{ $pt->skor }}</div>
                        <div><strong>Video:</strong> {{ $pt->video->title }}</div>
                        <!-- tanggal ini bebas dan, klo masukin jam susah ya tanggal nya aja -->
                        <div><strong>Diakses pada:</strong> {{ $pt->created_at->format('d-m-Y H:i') }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>