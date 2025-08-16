<x-app-layout>
    <section class="hero full-bg">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>PsikoEdukasi Laktasi</h1>
            <p>Selamat datang di LactaCare <br> “Edukasi ASI yang Tepat, untuk Ibu Hebat”</p>
            <p>Platform ini fokus memberikan PsikoEdukasi selama perjalanan menyusui agar ibu merasa percaya diri dan sukses memberikan ASI</p>

            @auth
                <a href="{{ route('pretest.create') }}" class="btn">Mulai Test</a>
            @else
                <a href="{{ route('login') }}" class="btn">Login untuk Mulai</a>
            @endauth
        </div>
    </section>
</x-app-layout>
