<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VideoProgressController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Video progress request received', $request->all());
        
        $request->validate([
            'video_filename' => 'required|string',
        ]);

        try {
            DB::table('user_video_progress')->insert([
                'user_id' => Auth::id(),
                'video_filename' => $request->video_filename,
                'watched_at' => now(),
            ]);

            \Log::info('Video progress saved successfully', [
                'user_id' => Auth::id(),
                'video_filename' => $request->video_filename
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Error saving video progress: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
