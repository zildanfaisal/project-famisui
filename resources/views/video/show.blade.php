<x-app-layout>
    <section class="video-section full-bg">
        <div class="overlay"></div>
        <div class="video-player-content">
            <h1>{{ $title }}</h1>

            <div class="video-wrapper">
                <video
                    id="videoPlayer"
                    controls
                    controlsList="nodownload"
                    oncontextmenu="return false"
                    data-video-id="{{ $filename }}"
                >
                    <source src="{{ asset('videos/' . $filename) }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutar video.
                </video>
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
