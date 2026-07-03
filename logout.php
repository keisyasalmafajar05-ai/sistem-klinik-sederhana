<?php

namespace App\Controllers;

class Logout extends BaseController
{
    /**
     * Menghapus session login dan mengarahkan kembali ke halaman login.
     */
    public function index()
    {
        // Hapus semua data session
        session()->destroy();

        // Arahkan ke halaman login dengan pesan sukses
        return redirect()->to('/login')->with('success', 'Anda berhasil logout.');
    }
}
