<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    protected ProdukModel $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    // READ - daftar semua produk (termasuk nonaktif) untuk admin
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->produkModel;
        if (!empty($keyword)) {
            $builder = $builder->like('nama_produk', $keyword);
        }

        $data = [
            'title'  => 'Kelola Produk & Layanan',
            'produk' => $builder->orderBy('created_at', 'DESC')->findAll(),
            'keyword' => $keyword,
        ];

        return view('admin/produk/index', $data);
    }

    // CREATE - form tambah produk
    public function create()
    {
        return view('admin/produk/create', ['title' => 'Tambah Produk']);
    }

    // CREATE - proses simpan produk baru
    public function store()
    {
        $rules = [
            'nama_produk' => 'required|min_length[3]|max_length[150]',
            'kategori'    => 'required|in_list[Obat,Layanan,Alat Kesehatan]',
            'harga'       => 'required|numeric',
            'stok'        => 'permit_empty|numeric',
            'gambar'      => 'permit_empty|is_image[gambar]|max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(ROOTPATH . 'public/uploads/produk', $namaGambar);
        }

        $this->produkModel->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori'    => $this->request->getPost('kategori'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok') ?: 0,
            'gambar'      => $namaGambar,
            'status'      => $this->request->getPost('status') ?: 'Aktif',
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    // UPDATE - form edit produk
    public function edit($id)
    {
        $produk = $this->produkModel->find($id);
        if (!$produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        return view('admin/produk/edit', [
            'title'  => 'Edit Produk',
            'produk' => $produk,
        ]);
    }

    // UPDATE - proses simpan perubahan produk
    public function update($id)
    {
        $produk = $this->produkModel->find($id);
        if (!$produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        $rules = [
            'nama_produk' => 'required|min_length[3]|max_length[150]',
            'kategori'    => 'required|in_list[Obat,Layanan,Alat Kesehatan]',
            'harga'       => 'required|numeric',
            'stok'        => 'permit_empty|numeric',
            'gambar'      => 'permit_empty|is_image[gambar]|max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $namaGambar = $produk['gambar'];
        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            // Hapus gambar lama jika ada
            if (!empty($produk['gambar']) && file_exists(ROOTPATH . 'public/uploads/produk/' . $produk['gambar'])) {
                unlink(ROOTPATH . 'public/uploads/produk/' . $produk['gambar']);
            }
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(ROOTPATH . 'public/uploads/produk', $namaGambar);
        }

        $this->produkModel->update($id, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori'    => $this->request->getPost('kategori'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok') ?: 0,
            'gambar'      => $namaGambar,
            'status'      => $this->request->getPost('status') ?: 'Aktif',
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diperbarui.');
    }

    // DELETE - hapus produk beserta file gambarnya
    public function delete($id)
    {
        $produk = $this->produkModel->find($id);
        if (!$produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        if (!empty($produk['gambar']) && file_exists(ROOTPATH . 'public/uploads/produk/' . $produk['gambar'])) {
            unlink(ROOTPATH . 'public/uploads/produk/' . $produk['gambar']);
        }

        $this->produkModel->delete($id);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus.');
    }
}
