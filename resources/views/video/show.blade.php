<x-app-layout>
    <section class="video-section full-bg">
        <div class="overlay"></div>
        <div class="video-player-content">
            <h1>{{ $video->title }}</h1>

            <div class="video-wrapper">
                <video
                    id="videoPlayer"
                    controls
                    controlsList="nodownload"
                    oncontextmenu="return false"
                    data-video-id="{{ $video->title }}"
                >
                    <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutar video.
                </video>
                <p>{{ $video->description }}</p>
            </div>
        </div>
    </section>

    {{-- Include JS --}}
    <script>
        window.posttestUrl = '{{ route("posttest") }}';
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('js/video-tracker.js') }}"></script>
</x-app-layout>
