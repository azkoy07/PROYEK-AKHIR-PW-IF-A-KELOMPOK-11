
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - SportZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card border-0 shadow-sm p-4">
        <h2>Dashboard Admin SportZone</h2>
        <p>Selamat datang, {{ Auth::user()->nama }}!</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-dark" type="submit">
                Logout
            </button>
        </form>
    </div>
</div>

</body>
</html>
