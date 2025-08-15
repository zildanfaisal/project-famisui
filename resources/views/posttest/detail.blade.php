@extends('layouts.blank')

@section('content')
<div class="container">
    <h2>Detail Post-Test</h2>
    <hr>

    <p><strong>Nama:</strong> {{ $posttest->user->name }}</p>
    <p><strong>No. Telp:</strong> {{ $posttest->user->phone }}</p>
    <p><strong>Video Ditonton:</strong> {{ $posttest->video->title }}</p>
    <p><strong>Skor:</strong> {{ $posttest->skor }}</p>
    <p><strong>Berapa kali Anda menyusui bayi Anda secara langsung (bukan ASI perah) kemarin? Jika belum menyusui sama sekali isikan “0”</strong> 
    <br>{{ $posttest->intensitas_menyusui }} kali</p>
    <p><strong>Apakah kemarin bayi Anda diberi susu formula atau makanan lain?</strong>
    <br>{{ $posttest->susu_formula ? 'Ya' : 'Tidak' }}</p>
    <p><strong>Pilih jenis perawatan bayi yang telah Anda lakukan secara mandiri kemarin? Anda bisa memilih lebih dari satu perawatan</strong>
        <br>
        @if($posttest->perawatan && is_array($posttest->perawatan))
            {{ implode(', ', $posttest->perawatan) }}
        @else
            -
        @endif
    </p>
    <p><strong>Apakah Anda mengalami kendala dalam menyusui bayi Anda? Tuliskan kendala Anda</strong>
    <br>{{ $posttest->kendala_menyusui ?? '-' }}</p>
    <p><strong>Apakah Anda ingin melakukan konsultasi terkait kendala menyusui yang Anda alami?</strong>
    <br>{{ $posttest->konsultasi_kendala ? 'Ya' : 'Tidak' }}</p>
</div>
@endsection
