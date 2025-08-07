<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostTestController extends Controller
{
    public function show()
    {
        return view('posttest');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'answers' => 'required|array|size:11',
        ]);

        $score = array_sum($validated['answers']);

        // Simpan ke database jika perlu
        // Misal: PostTestResult::create([...])

        return redirect()->route('video')->with('score', $score);
    }
}
