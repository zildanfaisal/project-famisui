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

        return redirect()->route('video.rekomendasi', [
            'ids' => implode(',', $request->video_id ?? []),
        ])->with('success', 'Pretest berhasil disimpan.');
    }

}
