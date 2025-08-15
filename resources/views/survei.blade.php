@push('styles')
    <link rel="stylesheet" href="{{ asset('css/survey.css') }}">
@endpush

<x-app-layout>
    <section class="survey-section">
        <div class="overlay"></div>

        <div class="survey-box">
            <h1 class="survey-title">Puaskah Anda dengan LactaCare</h1>

            <form id="surveyForm" href="{{ route('survey.store') }}" method="POST">
                {{-- CSRF Token --}}
                @csrf  
                <!-- Rating Bintang -->
                <div class="star-rating">
                    @for ($i = 5; $i >= 1; $i--)
                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                        <label for="star{{ $i }}" title="{{ $i }} stars">&#9733;</label>
                    @endfor
                </div>

                <!-- Textarea -->
                <textarea name="feedback" placeholder="Tulis ulasan Anda di sini..." required></textarea>

                <!-- Button -->
                <button type="submit" class="btn-submit">Kirim</button>
            </form>
        </div>
    </section>

    <!-- INI CUMA BUAT KONDISI SEAKAN-AKAN KALO KLIK KIRIM DATA NYA SUDAH HILANG (TER-UPLOAD) -->
    @push('scripts')
    <script>
        document.getElementById("surveyForm").addEventListener("submit", function(e) {
            e.preventDefault(); // cegah submit asli

            alert("Terima kasih atas ulasan Anda!"); 

            // Reset form (bintang & textarea kosong lagi)
            this.reset();

            // Scroll ke atas (opsional)
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    @endpush
</x-app-layout>