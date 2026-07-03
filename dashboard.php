<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    /**
     * Menampilkan halaman dashboard utama.
     */
    public function index()
    {
        $data = [
            'title'   => 'Dashboard',
            'user'    => session()->get('username') ?? 'Guest',
            'summary' => [
                'total_user'    => 120,
                'total_produk'  => 45,
                'total_transaksi' => 320,
            ],
        ];

        return view('dashboard/index', $data);
    }
}
