
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/auth.css'])
</head>

<body>

<div class="auth-wrapper">

    <div class="auth-container auth-container-register">

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
                    <i class="bi bi-stars me-1"></i>
                    JOIN SPORTZONE
                </span>

                <h1>Start Your<br>Journey.</h1>

                <p>
                    Bergabung dan temukan perlengkapan terbaik untuk aktivitas olahragamu.
                </p>

            </div>

            <div class="brand-footer">
                © {{ date('Y') }} SportZone. All rights reserved.
            </div>

        </section>

        <!-- PANEL KANAN: REGISTER -->
        <section class="auth-form-section">

            <div class="auth-form-content register-form">

                <div class="form-heading">

                    <div class="eyebrow">
                        CREATE ACCOUNT
                    </div>

                    <h2>Buat Akun</h2>

                    <p>
                        Lengkapi data berikut untuk bergabung dengan SportZone.
                    </p>

                </div>

                <!-- NOTIFIKASI VALIDASI -->
                @if ($errors->any())
                    <div class="alert alert-danger auth-alert">

                        <i class="bi bi-exclamation-circle-fill me-2"></i>

                        {{ $errors->first() }}

                    </div>
                @endif

                <!-- FORM REGISTER -->
                <form action="{{ route('register.store') }}" method="POST">

                    @csrf

                    <!-- NAMA LENGKAP -->
                    <div class="form-group">

                        <label for="nama" class="form-label">
                            Nama Lengkap
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-person"></i>

                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-control"
                                placeholder="Masukkan nama lengkap"
                                value="{{ old('nama') }}"
                                autocomplete="name"
                                required
                            >

                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div class="form-group">

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

                    <!-- NOMOR HP -->
                    <div class="form-group">

                        <label for="no_hp" class="form-label">

                            Nomor HP

                            <span class="text-secondary fw-normal">
                                (Opsional)
                            </span>

                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-telephone"></i>

                            <input
                                type="text"
                                id="no_hp"
                                name="no_hp"
                                class="form-control"
                                placeholder="Masukkan nomor HP"
                                value="{{ old('no_hp') }}"
                                autocomplete="tel"
                            >

                        </div>

                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group">

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
                                placeholder="Buat password"
                                autocomplete="new-password"
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

                    <!-- KONFIRMASI PASSWORD -->
                    <div class="form-group">

                        <label for="password_confirmation" class="form-label">
                            Konfirmasi Password
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-shield-lock"></i>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Ulangi password"
                                autocomplete="new-password"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('password_confirmation', this)"
                                aria-label="Tampilkan password"
                            >
                                <i class="bi bi-eye"></i>
                            </button>

                        </div>

                    </div>

                    <!-- TOMBOL REGISTER -->
                    <button type="submit" class="btn btn-auth mt-2">

                        Buat Akun

                        <i class="bi bi-arrow-right ms-2"></i>

                    </button>

                </form>

                <!-- LINK LOGIN -->
                <div class="auth-switch">

                    Sudah punya akun?

                    <a href="{{ route('login') }}">
                        Masuk sekarang
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
