<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    // Menentukan identitas penerima notifikasi
    private function getRecipientKey()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return 'admin';
            }

            return 'customer:' . Auth::id();
        }

        return 'guest:' . session()->getId();
    }

    // Menampilkan seluruh riwayat notifikasi
    public function index()
    {
        $recipientKey = $this->getRecipientKey();

        $notifications = DB::table('notifications')
            ->where('recipient_key', $recipientKey)
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(15);

        $jumlahBelumDibaca = DB::table('notifications')
            ->where('recipient_key', $recipientKey)
            ->whereNull('read_at')
            ->count();

        return view('notifications.index', compact(
            'notifications',
            'jumlahBelumDibaca'
        ));
    }

    // Membaca satu notifikasi
    public function read($id)
    {
        $recipientKey = $this->getRecipientKey();

        $notification = DB::table('notifications')
            ->where('id', $id)
            ->where('recipient_key', $recipientKey)
            ->first();

        if (!$notification) {
            return redirect()
                ->route('notifications.index')
                ->with('error', 'Notifikasi tidak ditemukan.');
        }

        if ($notification->read_at === null) {
            DB::table('notifications')
                ->where('id', $id)
                ->where('recipient_key', $recipientKey)
                ->whereNull('read_at')
                ->update([
                    'read_at' => now(),
                    'updated_at' => now(),
                ]);
        }

        return redirect($notification->link ?: route('notifications.index'));
    }

    // Membaca semua notifikasi
    public function readAll()
    {
        $recipientKey = $this->getRecipientKey();

        DB::table('notifications')
            ->where('recipient_key', $recipientKey)
            ->whereNull('read_at')
            ->update([
                'read_at' => now(),
                'updated_at' => now(),
            ]);

        return back()->with(
            'success',
            'Semua notifikasi berhasil ditandai sudah dibaca.'
        );
    }
}
