
<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            <div>
                <h5 class="fw-bold mb-1">
                    <i class="bi bi-bell me-2"></i>
                    Notifikasi Aktivitas Toko
                </h5>

                <small class="text-secondary">
                    Informasi terbaru mengenai aktivitas SportZone
                </small>
            </div>

            <span class="badge bg-primary rounded-pill">
                {{ $jumlahNotifikasiAdmin }} Notifikasi
            </span>

        </div>
    </div>

    <div class="card-body p-0">

        @forelse($notifikasiAdmin as $notifikasi)

            <a href="{{ $notifikasi['link'] }}"
               class="text-decoration-none text-dark">

                <div class="d-flex align-items-start gap-3 p-3 border-bottom notification-item">

                    <div class="rounded-circle bg-{{ $notifikasi['warna'] }} bg-opacity-10
                                text-{{ $notifikasi['warna'] }}
                                d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width: 42px; height: 42px;">

                        <i class="bi {{ $notifikasi['ikon'] }} fs-5"></i>

                    </div>

                    <div class="flex-grow-1">

                        <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">

                            <strong>
                                {{ $notifikasi['judul'] }}
                            </strong>

                            <span class="badge bg-{{ $notifikasi['warna'] }} bg-opacity-10
                                         text-{{ $notifikasi['warna'] }}">
                                {{ $notifikasi['tipe'] }}
                            </span>

                        </div>

                        <p class="text-secondary small mb-1">
                            {{ $notifikasi['pesan'] }}
                        </p>

                        <small class="text-muted">
                            <i class="bi bi-clock me-1"></i>

                            {{ $notifikasi['waktu']
                                ? \Carbon\Carbon::parse($notifikasi['waktu'])->diffForHumans()
                                : '-' }}
                        </small>

                    </div>

                    <i class="bi bi-chevron-right text-secondary mt-2"></i>

                </div>

            </a>

        @empty

            <div class="text-center py-5">

                <i class="bi bi-bell-slash text-secondary"
                   style="font-size: 35px;"></i>

                <h6 class="fw-bold mt-3">
                    Belum Ada Notifikasi
                </h6>

                <p class="text-secondary small mb-0">
                    Aktivitas terbaru toko akan muncul di bagian ini.
                </p>

            </div>

        @endforelse

    </div>

    <div class="card-footer bg-white text-end">

        <small class="text-secondary">
            Notifikasi diperbarui saat halaman dashboard dibuka.
        </small>

    </div>

</div>

<style>
    .notification-item {
        transition: background-color 0.2s ease;
    }

    .notification-item:hover {
        background-color: #f8f9fa;
    }
</style>
