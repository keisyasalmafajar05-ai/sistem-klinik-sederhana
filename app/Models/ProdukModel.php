<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'nama_produk',
        'kategori',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nama_produk' => 'required|min_length[3]|max_length[150]',
        'kategori'    => 'required|in_list[Obat,Layanan,Alat Kesehatan]',
        'harga'       => 'required|numeric',
        'stok'        => 'permit_empty|numeric',
        'status'      => 'permit_empty|in_list[Aktif,Nonaktif]',
    ];

    protected $validationMessages = [
        'nama_produk' => [
            'required'   => 'Nama produk wajib diisi.',
            'min_length' => 'Nama produk minimal 3 karakter.',
        ],
        'harga' => [
            'required' => 'Harga wajib diisi.',
            'numeric'  => 'Harga harus berupa angka.',
        ],
    ];

    // Ambil produk aktif untuk halaman publik, mendukung pencarian & filter kategori
    public function getProdukPublic(?string $keyword = null, ?string $kategori = null)
    {
        $builder = $this->where('status', 'Aktif');

        if (!empty($keyword)) {
            $builder->like('nama_produk', $keyword);
        }
        if (!empty($kategori)) {
            $builder->where('kategori', $kategori);
        }

        return $builder->orderBy('created_at', 'DESC')->findAll();
    }
}
