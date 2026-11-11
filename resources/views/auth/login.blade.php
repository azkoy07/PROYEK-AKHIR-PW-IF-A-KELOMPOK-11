
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/auth.css'])
</head>

<body>

<div class="auth-wrapper">

    <div class="auth-container auth-container-login">

        <!-- PANEL KIRI -->
        <section class="auth-brand">

            <div class="brand-logo">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSb7R4-yRWd4lz7OeydWzpRSS1zmmLYxoLbaYYamIP34w&s=10"
                    alt="Logo SportZone"
                >

                <div>
                    <div class="brand-name">SportZone</div>
                    <div class="brand-tagline">Sportswear & Equipment</div>
                </div>
            </div>

            <div class="brand-content">

                <span class="brand-label">
                    <i class="bi bi-lightning-charge-fill me-1"></i>
                    SPORTZONE
                </span>

                <h1>Gear Up.<br>Move Forward.</h1>

                <p>
                    Temukan perlengkapan olahraga yang mendukung setiap langkahmu.
                </p>

            </div>

            <div class="brand-footer">
                © {{ date('Y') }} SportZone. All rights reserved.
            </div>

        </section>

        <!-- PANEL KANAN: LOGIN -->
        <section class="auth-form-section">

            <div class="auth-form-content">

                <div class="form-heading">

                    <div class="eyebrow">
                        ACCOUNT LOGIN
                    </div>

                    <h2>Selamat Datang!</h2>

                    <p>
                        Masuk ke akun SportZone untuk melanjutkan.
                    </p>

                </div>

                <!-- NOTIFIKASI BERHASIL -->
                @if (session('success'))
                    <div class="alert alert-success auth-alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- NOTIFIKASI VALIDASI -->
                @if ($errors->any())
                    <div class="alert alert-danger auth-alert">
                        <i class="bi bi-exclamation-circle-fill me-2"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- FORM LOGIN -->
                <form action="{{ route('login.process') }}" method="POST">

                    @csrf

                    <!-- EMAIL -->
                    <div class="mb-3">

                        <label for="email" class="form-label">
                            Alamat Email
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-envelope"></i>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                placeholder="Masukkan alamat email"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                required
                            >

                        </div>

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-4">

                        <label for="password" class="form-label">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-lock"></i>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('password', this)"
                                aria-label="Tampilkan password"
                            >
                                <i class="bi bi-eye"></i>
                            </button>

                        </div>

                    </div>

                    <!-- TOMBOL LOGIN -->
                    <button type="submit" class="btn btn-auth">

                        Masuk ke Akun

                        <i class="bi bi-arrow-right ms-2"></i>

                    </button>

                </form>

                <!-- LINK REGISTER -->
                <div class="auth-switch">

                    Belum punya akun?

                    <a href="{{ route('register') }}">
                        Daftar sekarang
                    </a>

                </div>

            </div>

        </section>

    </div>

</div>

<!-- JAVASCRIPT PASSWORD -->
<script>
    function togglePassword(inputId, button) {

        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');

        if (input.type === 'password') {

            input.type = 'text';

            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');

            button.setAttribute(
                'aria-label',
                'Sembunyikan password'
            );

        } else {

            input.type = 'password';

            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');

            button.setAttribute(
                'aria-label',
                'Tampilkan password'
            );

        }

    }
</script>

</body>
</html>
