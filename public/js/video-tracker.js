document.addEventListener('DOMContentLoaded', () => {
    const video = document.getElementById('videoPlayer');

    if (!video) {
        console.log('Video player not found');
        return;
    }

    console.log('Video tracker initialized');

    // Test event listeners
    video.addEventListener('play', () => {
        console.log('Video started playing');
    });

    video.addEventListener('pause', () => {
        console.log('Video paused');
    });

    video.addEventListener('ended', () => {
        console.log('Video ended, sending completion data');
        const videoId = video.getAttribute('data-video-id');

        console.log('Sending request to /track-video with video ID:', videoId);
        fetch('/track-video', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.csrfToken || document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ video_filename: videoId })
        })
        .then(response => {
            console.log('Response received:', response);
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);
            if (data.success) {
                console.log('Redirecting to posttest...');
                window.location.href = window.posttestUrl || '/posttest';
            } else {
                console.error('Failed to save progress');
                alert('Gagal menyimpan progress.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
