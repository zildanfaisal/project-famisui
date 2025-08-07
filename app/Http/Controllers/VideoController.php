<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $videos = [
            1 => ['filename' => 'Bayi diare.mp4', 'title' => 'Khawatir jika harus berhenti menyusui ketika bayi diare'],
            2 => ['filename' => 'Kolostrum.mp4', 'title' => 'Khawatir jika bayi minum kolostrum'],
            3 => ['filename' => 'Payudara Kendor Karena Menyusui.mp4', 'title' => 'Khawatir jika payudara kendur setelah menyusui'],
            4 => ['filename' => 'Penyebab Bayi Menangis.mp4', 'title' => 'Khawatir jika ASI tidak cukup (bayi masih nangis setelah disusui)'],
            5 => ['filename' => 'Produksi ASI Pada Payudara Kecil.mp4', 'title' => 'Khawatir ASI sedikit karena ukuran payudara kecil'],
            6 => ['filename' => 'Story 6.mp4', 'title' => 'Khawatir jika tidak bisa menahan diri untuk tidak minum es selama masa menyusui'],
            7 => ['filename' => 'Story 7.mp4', 'title' => 'Khawatir ASI berbau amis jika makan ikan'],
            8 => ['filename' => 'Story 8.mp4', 'title' => 'Khawatir tidak bisa menyusui karena putting tenggelam/ datar/ tidak menonjol'],
            9 => ['filename' => 'Story 9.mp4', 'title' => 'Khawatir bayi sakit jika saya tetap menyusui ketika saya sedang sakit'],
            10 => ['filename' => 'Story 10.mp4', 'title' => 'Khawatir jika bayi hanya diberi ASI saja tanpa tambahan susu formula'],
            11 => ['filename' => 'Story 11.mp4', 'title' => 'Story 11'],
        ];

        if (!array_key_exists($id, $videos)) {
            abort(404, 'Video tidak ditemukan');
        }

        $video = $videos[$id];

        return view('video.show', [
            'filename' => $video['filename'],
            'title' => $video['title'],
        ]);
    }
}
