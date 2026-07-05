<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    protected ProdukModel $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    // Halaman utama publik: daftar produk/layanan klinik, mendukung pencarian & filter
    public function index()
    {
        $keyword  = $this->request->getGet('keyword');
        $kategori = $this->request->getGet('kategori');

        $data = [
            'title'   => 'Produk & Layanan Klinik',
            'produk'  => $this->produkModel->getProdukPublic($keyword, $kategori),
            'keyword' => $keyword,
            'kategori' => $kategori,
        ];

        return view('produk/index', $data);
    }

    // Detail satu produk untuk publik
    public function detail($id)
    {
        $produk = $this->produkModel->find($id);

        if (!$produk || $produk['status'] !== 'Aktif') {
            return redirect()->to('/')->with('error', 'Produk tidak ditemukan.');
        }

        return view('produk/detail', [
            'title'  => $produk['nama_produk'],
            'produk' => $produk,
        ]);
    }
}
