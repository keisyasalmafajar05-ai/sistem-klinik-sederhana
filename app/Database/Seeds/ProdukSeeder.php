<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_produk' => 'Cendera Lutut',
                'kategori'    => 'Layanan',
                'deskripsi'   => 'Penanganan cedera lutut dengan terapi dan perawatan medis untuk pemulihan optimal.',
                'harga'       => 0,
                'stok'        => 0,
                'gambar'      => null,
                'status'      => 'Aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_produk' => 'Treatment Facet Block',
                'kategori'    => 'Layanan',
                'deskripsi'   => 'Perawatan facet block untuk meredakan nyeri punggung dan leher secara efektif.',
                'harga'       => 0,
                'stok'        => 0,
                'gambar'      => null,
                'status'      => 'Aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_produk' => 'Terapi Rehabilitasi Lutut',
                'kategori'    => 'Layanan',
                'deskripsi'   => 'Program rehabilitasi untuk mempercepat pemulihan dan menguatkan sendi lutut.',
                'harga'       => 0,
                'stok'        => 0,
                'gambar'      => null,
                'status'      => 'Aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('produk')->insertBatch($data);
    }
}
