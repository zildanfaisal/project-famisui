<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('video.show', compact('video'));
        // $videos = [
        //     1 => ['filename' => 'Bayi diare.mp4', 'title' => 'Khawatir jika harus berhenti menyusui ketika bayi diare'],
        //     2 => ['filename' => 'Kolostrum.mp4', 'title' => 'Khawatir jika bayi minum kolostrum'],
        //     3 => ['filename' => 'Payudara Kendor Karena Menyusui.mp4', 'title' => 'Khawatir jika payudara kendur setelah menyusui'],
        //     4 => ['filename' => 'Penyebab Bayi Menangis.mp4', 'title' => 'Khawatir jika ASI tidak cukup (bayi masih nangis setelah disusui)'],
        //     5 => ['filename' => 'Produksi ASI Pada Payudara Kecil.mp4', 'title' => 'Khawatir ASI sedikit karena ukuran payudara kecil'],
        //     6 => ['filename' => 'Story 6.mp4', 'title' => 'Khawatir jika tidak bisa menahan diri untuk tidak minum es selama masa menyusui'],
        //     7 => ['filename' => 'Story 7.mp4', 'title' => 'Khawatir ASI berbau amis jika makan ikan'],
        //     8 => ['filename' => 'Story 8.mp4', 'title' => 'Khawatir tidak bisa menyusui karena putting tenggelam/ datar/ tidak menonjol'],
        //     9 => ['filename' => 'Story 9.mp4', 'title' => 'Khawatir bayi sakit jika saya tetap menyusui ketika saya sedang sakit'],
        //     10 => ['filename' => 'Story 10.mp4', 'title' => 'Khawatir jika bayi hanya diberi ASI saja tanpa tambahan susu formula'],
        //     11 => ['filename' => 'Story 11.mp4', 'title' => 'Story 11'],
        // ];

        // if (!array_key_exists($id, $videos)) {
        //     abort(404, 'Video tidak ditemukan');
        // }

        // $video = $videos[$id];

        // return view('video.show', [
        //     'filename' => $video['filename'],
        //     'title' => $video['title'],
        // ]);
    }

    public function index()
    {
        $videos = Video::all();
        return view('video.index', compact('videos'));
    }

    public function rekomendasi(Request $request)
    {
        $ids = explode(',', $request->input('ids', ''));
        $videos = Video::whereIn('id', $ids)->get();

        return view('video.rekomendasi', compact('videos'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return view('video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail_path' => 'required|image|mimes:jpg,jpeg,png|max:512000',
            'video_path' => 'required|file|mimes:mp4,mov,avi,flv|max:512000', // max 20MB
        ]);

        $thumbnailPath = $request->file('thumbnail_path')->store('thumbnails', 'public');

        $videoPath = $request->file('video_path')->store('videos', 'public');

        Video::create([
            'title' => $request->input('title'),
            'thumbnail_path' => $thumbnailPath,
            'video_path' => $videoPath,
        ]);

        return redirect()->route('video.index')->with('success', 'Video berhasil ditambahkan');
    }

    public function edit($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $video = Video::findOrFail($id);

        return view('video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $video = Video::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail_path' => 'required|image|mimes:jpg,jpeg,png|max:512000',
            'video_path' => 'nullable|file|mimes:mp4,mov,avi,flv|max:512000', // max 20MB
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('thumbnail_path')) {
            
            Storage::disk('public')->delete($video->thumbnail_path);

            $data['thumbnail_path'] = $request->file('thumbnail_path')->store('thumbnails', 'public');
            
        }

        if ($request->hasFile('video_path')) {
            
            Storage::disk('public')->delete($video->video_path);

            $data['video_path'] = $request->file('video_path')->store('videos', 'public');
        }

        $video->update($data);

        return redirect()->route('video.index')->with('success', 'Video berhasil diperbarui');
    }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $video = Video::findOrFail($id);

        Storage::disk('public')->delete($video->thumbnail_path);

        Storage::disk('public')->delete($video->video_path);

        $video->delete();

        return redirect()->route('video.index')->with('success', 'Video berhasil dihapus');
    }
}
