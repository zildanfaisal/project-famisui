@push('styles')
    <link rel="stylesheet" href="{{ asset('css/edit-video.css') }}">
@endpush

<x-app-layout>
    <section class="video-section full-bg">
        <div class="overlay"></div>
        <div class="video-content">
            <h1>Edit Video</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Judul Video</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $video->title) }}" required>
                </div>
                <div class="mb-3">
                    <label>Thumbnail Video</label>
                    @if($video->thumbnail_path)
                        <img src="{{ asset('storage/' . $video->thumbnail_path) }}" alt="Thumbnail" style="max-width: 200px; display:block; margin-bottom:10px;">
                    @endif
                    <input type="file" name="thumbnail_path" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Video</label>
                    <video width="200" controls>
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                    </video>                    
                </div>

                <div class="mb-3">
                    <label>Video Baru (opsional)</label>
                    <input type="file" name="video_path" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti video</small>
                </div>

                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </section>
</x-app-layout>
