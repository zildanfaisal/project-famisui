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

            @if(session('skor'))
                <div style="background: #f0f9ff; padding: 15px; margin-bottom: 20px; border-left: 5px solid #0ea5e9;">
                    <h4>Hasil Posttest</h4>
                    <p>{{ session('message') }}</p>
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
        </div>
    </section>
</x-app-layout>
