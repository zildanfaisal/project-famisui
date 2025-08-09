<x-app-layout>
    <section class="video-section full-bg">
        <div class="overlay"></div>
        <div class="video-content">
            <h1>Tambah Vidio</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Thumbnail</label>
                    <input type="file" name="thumbnail_path" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Video File</label>
                    <input type="file" name="video_path" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </section>
</x-app-layout>
