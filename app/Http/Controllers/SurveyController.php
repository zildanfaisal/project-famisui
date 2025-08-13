<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function create()
    {
        return view('survei'); // Pastikan ada view surveys/create.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:500',
        ]);

        Survey::create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        return redirect()->route('video.index')->with('success', 'Thank you for your feedback!');
    }
}
