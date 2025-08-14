<?php

namespace App\Http\Controllers;

use App\Models\Posttest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostTestController extends Controller
{

    public function show(Request $request)
    {
        $video_id = $request->query('video_id');
        if (!$video_id) {
            return redirect()->route('video.index')->withErrors(['Parameter video_id tidak ditemukan di URL.']);
        }

        $video = Video::find($video_id);
        if (!$video) {
            return redirect()->route('video.index')->withErrors(['Video tidak ditemukan.']);
        }

        return view('posttest', compact('video'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required|exists:videos,id',
            'answers' => 'required|array',
            'answers.*' => 'required|in:0,1,2',
        ]);

        $skor = array_sum($request->answers);

        Posttest::create([
            'user_id' => Auth::id(),
            'video_id' => $request->video_id,
            'skor' => $skor,
        ]);

        if ($skor >= 0 && $skor <= 5) {
            $message = "Selamat, Ibu! Anda telah membangun bonding yang kuat dan penuh kasih dengan buah hati Anda. 
            Teruslah menjaga dan memperkuat hubungan indah ini, karena setiap pelukan, tatapan, dan sentuhan akan menjadi pondasi berharga bagi tumbuh kembang si kecil.";
        } elseif ($skor >= 6) {
            $message = "Terus tingkatkan bonding dengan si kecil. 
            Bonding dengan si kecil adalah perjalanan yang bisa terus diperkuat setiap hari. 
            Mulailah dengan sentuhan lembut, tatapan penuh kasih, dan waktu berkualitas bersama. 
            Setiap langkah kecil yang Ibu lakukan akan membawa hubungan yang lebih hangat dan erat untuk Ibu dan buah hati tercinta.";
        }

        return redirect()->route('video.index')->with([
            'success' => 'Post test berhasil disimpan.',
            'skor' => $skor,
            'message' => $message
        ]);
    }
}
