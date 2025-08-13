<?php

namespace App\Http\Controllers;

use App\Models\Pretest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PretestController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $videos = Video::all();

        return view('pretest.create', compact('user', 'videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usia' => 'required|integer',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'jumlah_melahirkan' => 'required|integer',
            'periode_postpartum' => 'required|integer',
            'jenis_persalinan' => 'required|string',
            'jenis_kelamin_bayi' => 'required|string',
            'video_id' => 'nullable|array',
            'video_id.*' => 'exists:videos,id',
            'answers' => 'required|array',
            'answers.*' => 'required|in:0,1,2',
        ]);

        $user = Auth::user();
        $user->update([
            'usia' => $request->usia,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'jumlah_melahirkan' => $request->jumlah_melahirkan,
            'periode_postpartum' => $request->periode_postpartum,
            'jenis_persalinan' => $request->jenis_persalinan,
            'jenis_kelamin_bayi' => $request->jenis_kelamin_bayi,
        ]);

        $skor = array_sum($request->answers);

        Pretest::create([
            'user_id' => $user->id,
            'skor' => $skor,
            'video_id' => json_encode($request->video_id ?? []),
            'answers' => json_encode($request->answers),
        ]);

        if ($skor >= 0 && $skor <= 5) {
            $message = "Selamat, Ibu! Anda telah membangun bonding yang kuat dan penuh kasih dengan buah hati Anda. 
            Teruslah menjaga dan memperkuat hubungan indah ini, karena setiap pelukan, tatapan, dan sentuhan akan menjadi pondasi berharga bagi tumbuh kembang si kecil.";
        } elseif ($skor >= 6 && $skor <= 13) {
            $message = "Terus tingkatkan bonding dengan si kecil. 
            Bonding dengan si kecil adalah perjalanan yang bisa terus diperkuat setiap hari. 
            Mulailah dengan sentuhan lembut, tatapan penuh kasih, dan waktu berkualitas bersama. 
            Setiap langkah kecil yang Ibu lakukan akan membawa hubungan yang lebih hangat dan erat untuk Ibu dan buah hati tercinta.";
        } else {
            $message = "Hasil skor di luar rentang yang diharapkan.";
        }

        return redirect()->route('video.rekomendasi', [
            'ids' => implode(',', $request->video_id ?? []),
        ])->with([
            'success' => 'Pre test berhasil disimpan.',
            'skor' => $skor,
            'message' => $message
        ]);
    }

}
