@extends('layouts.blank')

@section('content')
<div class="container">

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Notifikasi Success --}}
    @if (session('success'))
        <div style="color: green; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    <h2>Selamat Datang<br><hr></h2>
    <p class="intro-text">
        Tinggalkan jejak Anda untuk mendukung ibu menyusui dengan mengisi survei identitas, lalu ikuti Psikoedukasi Laktasi kami untuk informasi bermanfaat!
    </p>

    <form action="{{ route('posttest.store') }}" method="POST">
        @csrf
        <input type="hidden" name="video_id" value="{{ $video->id }}">

        @php
        $questions = [
            ["Saya senang mengasuh bayi saya", true],
            ["Aku merasa kesal dengan bayiku saat kita bersama", false],
            ["Aku merasa sayang pada bayiku", true],
            ["Saya merasa bayi saya bersikap sulit atau mencoba membuat saya kesal dengan sengaja", false],
            ["Saya bisa mencari tahu apa yang dibutuhkan bayi saya dari saya", true],
            ["Saya merasa tidak bisa melakukan hal-hal yang saya sukai karena bayi saya", false],
            ["Saya merasa perubahan dalam hidup saya sepadan dengan usaha saya untuk mengasuh bayi saya", true],
            ["Aku merindukan bayiku saat kita tidak bersama", true],
            ["Aku merasa seperti sedang menjaga bayiku untuk orang lain", false],
            ["Ketika kita berpisah, aku berharap bisa bertemu lagi dengan bayiku", true],
            ["Saya senang bermain dengan bayi saya", true],
        ];
        @endphp

        @foreach ($questions as $index => [$text, $isPositive])
        <div class="question-box">
            <p class="question-text">
                {{ $index + 1 }}. {{ $text }} <span style="color:red">*</span>
            </p>
            <div class="answer-options">
                <label>
                    <input type="radio" name="answers[{{ $index }}]" value="{{ $isPositive ? 2 : 0 }}" required>
                    Tidak Pernah
                </label>
                <label>
                    <input type="radio" name="answers[{{ $index }}]" value="1" required>
                    Kadang-Kadang
                </label>
                <label>
                    <input type="radio" name="answers[{{ $index }}]" value="{{ $isPositive ? 0 : 2 }}" required>
                    Selalu
                </label>
            </div>
        </div>
        @endforeach

        <hr>
        <h2>Intensitas Menyusui<br></h2>
        <p class="intro-text">
            Mohon isi kuesioner ini sesuai dengan kondisi terkini Ibu dan buah hati. Jawaban yang jujur dan sesuai akan sangat membantu dalam pemantauan perkembangan bonding ibu dan si kecil.
        </p>
        <div class="question-box">
            <p class="question-text">Berapa kali Anda menyusui bayi Anda secara langsung (bukan ASI perah) kemarin? Jika belum menyusui sama sekali isikan “0”<span style="color:red">*</span></p class="question-text">
            <input type="number" name="intensitas_menyusui" class="form-control" min="0" required>
        </div>

        <div class="question-box">
            <p class="question-text">Apakah kemarin bayi Anda diberi susu formula atau makanan lain?<span style="color:red">*</span></p>
            <div class="answer-options">
                <label><input type="radio" name="susu_formula" value="1" required> Ya</label>
                <label><input type="radio" name="susu_formula" value="0" required> Tidak</label>
            </div>
        </div>

        <div class="question-box">
            <p class="question-text">Pilih jenis perawatan bayi yang telah Anda lakukan secara mandiri kemarin? Anda bisa memilih lebih dari satu perawatan<span style="color:red">*</span></p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="perawatan[]" value="menggendong"> 
                <label class="form-check-label">Menggendong</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="perawatan[]" value="ganti_popok"> 
                <label class="form-check-label">Mengganti popok setelah BAK/BAB</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="perawatan[]" value="memandikan"> 
                <label class="form-check-label">Memandikan</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="perawatan[]" value="memakaikan_baju"> 
                <label class="form-check-label">Memakaikan baju setelah mandi</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="perawatan[]" value="memijat"> 
                <label class="form-check-label">Memijat/membelai bayi</label>
            </div>
        </div>

        <div class="question-box">
            <p class="question-text">Apakah Anda mengalami kendala dalam menyusui bayi Anda? Tuliskan kendala Anda</p>
            <textarea name="kendala_menyusui" class="form-control" rows="3"></textarea>
        </div>
        
        <div class="question-box">
            <p class="question-text">Apakah Anda ingin melakukan konsultasi terkait kendala menyusui yang Anda alami?<span style="color:red">*</span></p>
            <div class="answer-options">
                <label><input type="radio" name="konsultasi_kendala" value="1" required> Ya</label>
                <label><input type="radio" name="konsultasi_kendala" value="0" required> Tidak</label>
            </div>
        </div>

        <br>
        <button type="submit">Kirim Jawaban</button>
    </form>
</div>
@endsection
