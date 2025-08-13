@push('styles')
    <link rel="stylesheet" href="{{ asset('css/video.css') }}">
@endpush

<x-app-layout>
    <section class="video-section full-bg">
        <div class="overlay"></div>
        <div class="video-content">
            <h1>Video Rekomendasi Anda</h1>

            @if($videos->isEmpty())
                <p>Tidak ada video rekomendasi.</p>
            @else

            @if(session('skor'))
                <div style="background: #f0f9ff; padding: 15px; margin-bottom: 20px; border-left: 5px solid #0ea5e9;">
                    <h4>Hasil Pretest</h4>
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            
            <div class="video-cards">
                @foreach($videos as $video)
                    <div class="video-card">
                        <video width="100%" controls>
                            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                            Browser Anda tidak mendukung pemutaran video.
                        </video>
                        <h2>{{ $video->title }}</h2>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
</x-app-layout>
