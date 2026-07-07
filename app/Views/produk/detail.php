<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary btn-sm mb-4"><i class="bi bi-arrow-left"></i> Kembali</a>

    <div class="row g-4">
        <div class="col-12 col-md-5">
            <?php if (!empty($produk['gambar'])): ?>
                <img src="<?= base_url('public/uploads/produk/' . $produk['gambar']) ?>" class="img-fluid rounded shadow-sm" alt="<?= esc($produk['nama_produk']) ?>">
            <?php else: ?>
                <img src="https://via.placeholder.com/500x400?text=Klinik+Sehat" class="img-fluid rounded shadow-sm" alt="Tanpa gambar">
            <?php endif; ?>
        </div>
        <div class="col-12 col-md-7">
            <span class="badge badge-kategori mb-2"><?= esc($produk['kategori']) ?></span>
            <h2 class="fw-bold"><?= esc($produk['nama_produk']) ?></h2>
            <h4 class="mb-3" style="color:#0d9488;">Rp <?= number_format((float) $produk['harga'], 0, ',', '.') ?></h4>
            <p class="text-muted"><?= nl2br(esc($produk['deskripsi'] ?? '-')) ?></p>
            <div class="card border-0 shadow-sm rounded-4 mt-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Informasi Produk</h5>
                    <p class="mb-2"><strong>Kategori:</strong> <?= esc($produk['kategori']) ?></p>
                    <p class="mb-2"><strong>Stok tersedia:</strong> <?= (int) $produk['stok'] ?></p>
                    <p class="mb-0"><strong>Status:</strong> <?= esc($produk['status']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
