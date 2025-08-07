<x-app-layout>
    <section class="hero full-bg">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>PsikoEdukasi Laktasi</h1>
            <p>Panduan terpercaya untuk ibu-ibu baru. Hilangkan mitos, pelajari fakta medis, dan dukung perjalanan menyusui Anda.</p>

            @auth
                <a href="/survei" class="btn">Mulai Test</a>
            @else
                <a href="{{ route('login') }}" class="btn">Login untuk Mulai</a>
            @endauth
        </div>
    </section>
</x-app-layout>
