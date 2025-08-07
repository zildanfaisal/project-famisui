<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-page">
  <div class="overlay"></div>
  <div class="login-container">
    <h2>Login</h2>

    <!-- Pesan sukses dari register -->
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesan error login (email salah, password salah, dll.) -->
    @if ($errors->any())
      <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <input type="email" name="email" placeholder="Email" required>

      <div style="position: relative;">
        <input type="password" name="password" placeholder="Password" required style="width:100%; padding-right:40px;">
        <button type="button" class="toggle-password" 
                data-show="{{ asset('img/show.png') }}" 
                data-hide="{{ asset('img/hide.png') }}"
                style="position:absolute; right:10px; top:50%; transform:translateY(-50%);
                       background:none; border:none; cursor:pointer; padding:0;">
          <img src="{{ asset('img/show.png') }}" alt="Toggle" style="width:20px; height:20px;">
        </button>
      </div>

      <button type="submit" class="btn-login">Masuk</button>
    </form>
    <p class="register-text"> Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
  </div>
  <script src="{{ asset('js/togglePassword.js') }}"></script>
</body>
</html>