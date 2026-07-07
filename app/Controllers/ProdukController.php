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

        $produk = $this->produkModel->getProdukPublic($keyword, $kategori);

        if (empty($produk)) {
            $produk = [
                [
                    'id'         => null,
                    'nama_produk'=> 'Cendera Lutut',
                    'kategori'   => 'Layanan',
                    'deskripsi'  => 'Penanganan cedera lutut dengan terapi dan perawatan medis untuk pemulihan optimal.',
                    'harga'      => 0,
                    'gambar'     => null,
                    'status'     => 'Aktif',
                ],
                [
                    'id'         => null,
                    'nama_produk'=> 'Treatment Facet Block',
                    'kategori'   => 'Layanan',
                    'deskripsi'  => 'Perawatan facet block untuk meredakan nyeri punggung dan leher secara efektif.',
                    'harga'      => 0,
                    'gambar'     => null,
                    'status'     => 'Aktif',
                ],
                [
                    'id'         => null,
                    'nama_produk'=> 'Terapi Rehabilitasi Lutut',
                    'kategori'   => 'Layanan',
                    'deskripsi'  => 'Program rehabilitasi untuk mempercepat pemulihan dan menguatkan sendi lutut.',
                    'harga'      => 0,
                    'gambar'     => null,
                    'status'     => 'Aktif',
                ],
            ];
        }

        $data = [
            'title'   => 'Produk & Layanan Klinik',
            'produk'  => $produk,
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
