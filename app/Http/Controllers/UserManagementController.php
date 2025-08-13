<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Posttest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $admin = User::where('role', 'admin')->get();
        $users = User::where('role', 'user')->get();

        return view('UserManajemen.index', compact('admin', 'users'));
    }

    public function edit($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $user = User::findOrFail($id);
        return view('UserManajemen.ubahPassword', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
        return redirect()
            ->route('admin.users.index')
            ->with('error', 'Password lama tidak sesuai.');
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Password berhasil diubah.');
    }

    public function records()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $users = User::where('role', 'user')->with('pretest')->get();
        
        return view('UserManajemen.records', compact('users'));
    }

    public function detailRecords($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $user = User::with(['pretest', 'posttest'])->findOrFail($id);
        $posttestCount = $user->posttest ? $user->posttest->count() : 0;
        $jumlah_video = Posttest::where('user_id', $user->id)->distinct('video_id')->count('video_id');

        return view('UserManajemen.detailRecord', [
            'user' => $user,
            'posttestCount' => $posttestCount,
            'posttests' => $user->posttest ?? collect(),
            'jumlah_video' => $jumlah_video,
        ]);
    }
}
