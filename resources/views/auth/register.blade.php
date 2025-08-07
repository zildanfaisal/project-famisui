<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="register-page">
  <div class="overlay"></div>
  <div class="register-container">
    <h2>Daftar Akun</h2>

    <!-- Pesan error -->
    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <input type="text" name="name" placeholder="Nama Lengkap" required>
      <input type="text" name="phone" placeholder="No. WhatsApp" required>
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

      <div style="position: relative;">
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required style="width:100%; padding-right:40px;">
        <button type="button" class="toggle-password" 
                data-show="{{ asset('img/show.png') }}" 
                data-hide="{{ asset('img/hide.png') }}"
               style="position:absolute; right:10px; top:50%; transform:translateY(-50%);
                       background:none; border:none; cursor:pointer; padding:0;">
          <img src="{{ asset('img/show.png') }}" alt="Toggle" style="width:20px; height:20px;">
        </button>
      </div>

      <button type="submit" class="btn-register">Daftar</button>
    </form>
    <p class="login-text">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
  </div>
  <script src="{{ asset('js/togglePassword.js') }}"></script>
</body>
</html>
