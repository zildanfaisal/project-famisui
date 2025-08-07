<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnsureVideoWatched
{
    public function handle(Request $request, Closure $next)
    {
        \Log::info('Checking video watched status for user: ' . Auth::id());
        
        // Check if user has watched any video
        $hasWatched = DB::table('user_video_progress')
            ->where('user_id', Auth::id())
            ->exists();

        \Log::info('User has watched video: ' . ($hasWatched ? 'yes' : 'no'));

        if (!$hasWatched) {
            \Log::info('Redirecting user to dashboard - no video watched');
            return redirect('/dashboard')->with('error', 'Anda harus menyelesaikan video terlebih dahulu.');
        }

        \Log::info('User can access posttest');
        return $next($request);
    }
}
