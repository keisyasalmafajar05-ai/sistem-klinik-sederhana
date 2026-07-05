<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
            <form action="<?= base_url('admin/produk') ?>" method="get" class="d-flex gap-2">
                <input type="text" name="keyword" class="form-control" placeholder="Cari produk..." value="<?= esc($keyword ?? '') ?>">
                <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
            </form>
            <a href="<?= base_url('admin/produk/create') ?>" class="btn btn-klinik">
                <i class="bi bi-plus-circle"></i> Tambah Produk
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($produk)): ?>
                        <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data produk.</td></tr>
                    <?php else: ?>
                        <?php foreach ($produk as $item): ?>
                            <tr>
                                <td>
                                    <?php if (!empty($item['gambar'])): ?>
                                        <img src="<?= base_url('uploads/produk/' . $item['gambar']) ?>" class="thumb-produk" alt="">
                                    <?php else: ?>
                                        <span class="text-muted small">-</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($item['nama_produk']) ?></td>
                                <td><span class="badge bg-secondary"><?= esc($item['kategori']) ?></span></td>
                                <td>Rp <?= number_format((float) $item['harga'], 0, ',', '.') ?></td>
                                <td><?= (int) $item['stok'] ?></td>
                                <td>
                                    <?php if ($item['status'] === 'Aktif'): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Nonaktif</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="<?= base_url('admin/produk/edit/' . $item['id']) ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="<?= base_url('admin/produk/delete/' . $item['id']) ?>" class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('Yakin ingin menghapus produk ini?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
