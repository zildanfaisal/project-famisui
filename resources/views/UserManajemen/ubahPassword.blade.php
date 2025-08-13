<link rel="stylesheet" href="css/style.css">

<body class="login-page">
    <div class="overlay"></div>
    
    <div class="login-container">
        <h2>Ubah Password</h2>
        <form action="/preview-ubah-password" method="POST">
            @csrf
            @method('PUT')

            <input type="password" name="old_password" placeholder="Password Lama" value="123456" required>
            <input type="password" name="new_password" placeholder="Password Baru" required>

            <button type="submit" class="btn-login">Ubah Password</button>
        </form>
    </div>
</body>