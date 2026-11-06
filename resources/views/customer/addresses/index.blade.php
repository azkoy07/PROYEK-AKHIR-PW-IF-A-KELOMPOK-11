
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alamat Pengiriman - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Alamat Pengiriman</h3>
            <p class="text-secondary mb-0">
                Kelola alamat pengiriman pesananmu.
            </p>
        </div>

        <a href="{{ route('customer.addresses.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Tambah Alamat
        </a>
    </div>

    <a href="{{ route('customer.dashboard') }}"
       class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Dashboard
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @forelse($addresses as $address)

        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between flex-wrap gap-2">

                    <div>
                        <h5 class="fw-bold mb-1">
                            {{ $address->penerima }}
                        </h5>

                        @if($address->is_utama)
                            <span class="badge bg-success mb-2">
                                Alamat Utama
                            </span>
                        @endif

                        <p class="mb-1">
                            <i class="bi bi-telephone"></i>
                            {{ $address->no_hp }}
                        </p>

                        <p class="mb-1">
                            {{ $address->alamat_lengkap }}
                        </p>

                        <p class="text-secondary mb-0">
                            {{ $address->kota ?: '-' }}
                            {{ $address->kode_pos ?: '' }}
                        </p>
                    </div>

                    <div class="d-flex flex-column gap-2">

                        <a href="{{ route('customer.addresses.edit', $address->id) }}"
                           class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                            Edit
                        </a>

                        @if(!$address->is_utama)
                            <form action="{{ route('customer.addresses.primary', $address->id) }}"
                                  method="POST">
                                @csrf
                                @method('PATCH')

                                <button type="submit"
                                        class="btn btn-outline-success btn-sm w-100">
                                    Jadikan Utama
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('customer.addresses.destroy', $address->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus alamat ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-outline-danger btn-sm w-100">
                                <i class="bi bi-trash"></i>
                                Hapus
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    @empty

        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <i class="bi bi-geo-alt text-secondary"
                   style="font-size: 50px;"></i>

                <h5 class="fw-bold mt-3">
                    Belum Ada Alamat
                </h5>

                <p class="text-secondary">
                    Silakan tambahkan alamat pengiriman terlebih dahulu.
                </p>

                <a href="{{ route('customer.addresses.create') }}"
                   class="btn btn-primary">
                    Tambah Alamat
                </a>
            </div>
        </div>

    @endforelse

</div>

</body>
</html>
