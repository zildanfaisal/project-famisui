<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Password</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-page">
    <div class="overlay"></div>
    
    <div class="login-container">
        <h2>Ubah Password</h2>
        {{-- Alert jika ada pesan sukses --}}
        @if(session('success'))
            <div style="background-color: #d4edda; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb; color: #155724;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Alert jika ada pesan error --}}
        @if(session('error'))
            <div style="background-color: #f8d7da; padding: 10px; margin-bottom: 15px; border: 1px solid #f5c6cb; color: #721c24;">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="password" name="current_password" placeholder="Password Lama" required>
            <input type="password" name="new_password" placeholder="Password Baru" required>
            <input type="password" name="new_password_confirmation" placeholder="Konfirmasi Password Baru" required>

            <button type="submit" class="btn-login">Ubah Password</button>
        </form>
    </div>
</body>
</html>
