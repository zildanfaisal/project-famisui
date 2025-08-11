<x-app-layout>
    <style>
        .question-box {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .question-text {
            font-weight: 500;
            margin-bottom: 8px;
            color: #000; /* biar hitam */
        }
        .answer-options label {
            margin-right: 15px;
        }
        .video-list {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            background: #fff;
        }
        .btn-submit {
            color: white;
            margin-top: 20px;
            background: blue;
            margin-bottom: 20px;
        }
    </style>

    <section class="py-5" style="background-color: #fff; color: #000; padding-top: 100px;">
        <div class="container" style="margin-left: 100px; margin-right: 100px;">

            @if(session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>Form Pretest</h2>

            <form action="{{ route('pretest.store') }}" method="POST">
                @csrf

                {{-- Biodata --}}
                <h4>Biodata</h4>
                <div class="mb-3">
                    <label>Nama</label>
                    <br>
                    <input type="text" name="name" class="form-control" 
                        value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label>Usia</label>
                    <br>
                    <input type="number" name="usia" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Pendidikan Terakhir</label>
                    <br>
                    <input type="text" name="pendidikan_terakhir" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Pekerjaan</label>
                    <br>
                    <input type="text" name="pekerjaan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nomor Telepon</label>
                    <br>
                    <input type="text" name="phone" class="form-control" 
                        value="{{ Auth::user()->phone }}" readonly>
                </div>
                <div class="mb-3">
                    <label>Jumlah Melahirkan</label>
                    <br>
                    <input type="text" name="jumlah_melahirkan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Periode Postpartum</label>
                    <br>
                    <input type="text" name="periode_postpartum" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Persalinan</label>
                    <br>
                    <input type="text" name="jenis_persalinan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Kelamin Bayi</label>
                    <br>
                    <input type="text" name="jenis_kelamin_bayi" class="form-control" required>
                </div>

                {{-- Pertanyaan --}}
                <h4>Pertanyaan</h4>
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
                    <div class="question-box mb-3">
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

                {{-- Video Edukasi --}}
                <h4>Pilih Video Edukasi</h4>
                <div class="mb-3 video-list">
                    @foreach($videos as $video)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" 
                                   name="video_id[]" 
                                   value="{{ $video->id }}" 
                                   id="video{{ $video->id }}">
                            <label class="form-check-label" for="video{{ $video->id }}">
                                {{ $video->title }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-submit">Kirim Jawaban</button>
            </form>
        </div>
    </section>
</x-app-layout>
