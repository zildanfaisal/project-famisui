@push('styles')
    <link rel="stylesheet" href="{{ asset('css/video.css') }}">
@endpush

<x-app-layout>
    <section class="video-section full-bg">
        <div class="overlay"></div>
        <div class="video-content">
            <h1>Video</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="text-left" style="margin-bottom: 20px;">
                    <a href="{{ route('video.create') }}" class="btn btn-primary">
                        + Tambah Video
                    </a>
                </div>
            @endif
            
            <div class="video-cards">
                @foreach($videos as $video)
                    <div class="video-card">
                        <a href="{{ route('video.show', $video->id) }}" style="text-decoration: none;">
                        {{-- Display thumbnail if available --}}
                        <img src="{{ asset('storage/' . $video->thumbnail_path) }}" alt="{{ $video->title }}" style="width:100%; height:auto;">
                        <h2>{{ $video->title }}</h2>

                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <div class="action-buttons">
                                <a href="{{ route('video.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('video.destroy', $video->id) }}" method="POST" style="display:inline-block;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                        </a>
                    </div>
                @endforeach
            </div>


            {{-- <h1>Statis</h1> --}}
            {{-- <div class="video-cards">
                <a href="{{ route('video.show', ['id' => 1]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video1.png') }}" >
                    <h2>Khawatir jika harus berhenti menyusui ketika bayi diare</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 2]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video2.png') }}" >
                    <h2>Khawatir jika bayi minum kolostrum</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 3]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video3.png') }}" >
                    <h2>Khawatir jika payudara kendur setelah menyusui</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 4]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video4.png') }}" >
                    <h2>Khawatir jika ASI tidak cukup (bayi masih nangis setelah disusui)</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 5]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video5.png') }}" >
                    <h2>Khawatir ASI sedikit karena ukuran payudara kecil</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 6]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video6.png') }}" >
                    <h2>Khawatir jika tidak bisa menahan diri untuk tidak minum es selama masa menyusui</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 7]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video7.png') }}" >
                    <h2>Khawatir ASI berbau amis jika makan ikan</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 8]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video8.png') }}" >
                    <h2>Khawatir tidak bisa menyusui karena putting tenggelam/ datar/ tidak menonjol</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 9]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video9.png') }}" >
                    <h2>Khawatir bayi sakit jika saya tetap menyusui ketika saya sedang sakit</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 10]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video10.png') }}" >
                    <h2>Khawatir jika bayi hanya diberi ASI saja tanpa tambahan susu formula</h2>
                </a>
                <a href="{{ route('video.show', ['id' => 11]) }}" class="video-card">
                    <img src="{{ asset('img/thumbnails/video11.png') }}" >
                    <h2>Story 11</h2>
                </a>
            </div> --}}
        </div>
    </section>
</x-app-layout>
