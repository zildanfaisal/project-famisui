<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CustomRegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => [
                'required', 
                'string', 
                'max:20', 
                'regex:/^(\+62|0)8[1-9][0-9]{6,14}$/'
            ],
            'email' => [
                'required', 
                'string', 
                'email:rfc,dns', // validasi format email + cek DNS MX
                'regex:/^[\w\.\-]+@([\w\-]+\.)+com$/i', // hanya domain .com
                'max:255', 
                'unique:users' // email harus unik
            ],
            'password' => [
                'required', 
                'confirmed', // harus sama dengan field password_confirmation
                Rules\Password::defaults()], // minimal 8 karakter
        ], [
            'phone.regex' => 'Nomor tidak valid.',
        ]);

        // Format nomor telepon ke format WhatsApp
        $formattedPhone = \App\Helpers\PhoneHelper::formatToWhatsApp($request->phone);


        // Simpan user ke database
        $user = User::create([
            'name' => $request->name,
            'phone' => $formattedPhone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Jangan auto-login, arahkan ke halaman login
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
