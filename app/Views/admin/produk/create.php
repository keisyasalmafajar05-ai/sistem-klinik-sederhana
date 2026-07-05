<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="<?= base_url('admin/produk/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Nama Produk / Layanan</label>
                <input type="text" name="nama_produk" class="form-control" value="<?= old('nama_produk') ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <?php foreach (['Obat', 'Layanan', 'Alat Kesehatan'] as $kat): ?>
                            <option value="<?= $kat ?>" <?= old('kategori') === $kat ? 'selected' : '' ?>><?= $kat ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" step="0.01" name="harga" class="form-control" value="<?= old('harga') ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= old('stok', 0) ?>">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="form-control"><?= old('deskripsi') ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Produk</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <small class="text-muted">Format JPG/PNG/WEBP, maksimal 2MB.</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-klinik"><i class="bi bi-check-circle"></i> Simpan</button>
                <a href="<?= base_url('admin/produk') ?>" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
