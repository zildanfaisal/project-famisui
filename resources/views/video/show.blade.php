@push('styles')
    <link rel="stylesheet" href="{{ asset('css/video.css') }}">
@endpush

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
                {{-- <div style="margin-top:10px;">
                    <label>Kecepatan: </label>
                    <button onclick="setSpeed(0.5)">0.5x</button>
                    <button onclick="setSpeed(1)">1x (Normal)</button>
                    <button onclick="setSpeed(1.5)">1.5x</button>
                    <button onclick="setSpeed(2)">2x</button>
                </div> --}}
            </div>
        </div>
    </section>

    {{-- Include JS --}}
    {{-- <script>
        window.posttestUrl = '{{ route("posttest") }}';
        window.csrfToken = '{{ csrf_token() }}';
    </script> --}}
    {{-- <script src="{{ asset('js/video-tracker.js') }}"></script> --}}
    <script>
        document.getElementById('videoPlayer').addEventListener('ended', function() {
            window.location.href = "{{ route('posttest.show', ['video_id' => $video->id]) }}";
        });
    </script>
    {{-- <script>
        function setSpeed(rate) {
            document.getElementById('videoPlayer').playbackRate = rate;
        }
    </script> --}}

</x-app-layout>
