<x-app-layout>
    <section class="kontak-section full-bg">
        <div class="overlay"></div>
        <div class="kontak-content">
            <h1>Meet the <span>Team</span></h1>
            <p>Jika Anda memiliki pertanyaan atau butuh dukungan seputar menyusui,<br>jangan ragu untuk menghubungi kami. Kami siap membantu!</p>
            <div class="kontak-cards">
                <!-- Person 1 -->
                <div class="kontak-card">
                    <img src="{{ asset('img/Bu_Uke.png') }}">
                    <h2>Uke</h2>
                    <a href="#" onclick="sendWA('6281231397171')" class="wa-btn">Hubungi</a>
                </div>
                <!-- Person 2 -->
                <div class="kontak-card">
                    <img src="{{ asset('img/Bu_Yunik.png') }}">
                    <h2>Yunik</h2>
                    <a href="#" onclick="sendWA('6281330330090')" class="wa-btn">Hubungi</a>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
    <script>
        window.KOTAK_USER_NAME = "{{ Auth::check() ? Auth::user()->name : 'tamu' }}";
    </script>
    <script src="{{ asset('js/kontak.js') }}"></script>
</x-app-layout> 