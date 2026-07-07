<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="hero-klinik">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h1 class="fw-bold mb-3">Klinik Sehat, Solusi Obat & Layanan Kesehatan</h1>
                <p class="lead mb-4">Temukan obat, layanan pemeriksaan, dan dukungan kesehatan terbaik untuk keluarga Anda, semua dalam satu tempat.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="#produk" class="btn btn-light text-teal fw-semibold">Lihat Obat & Layanan</a>
                    <a href="<?= base_url('admin/login') ?>" class="btn btn-outline-light">Login Admin</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Kenapa memilih Klinik Sehat?</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Obat berkualitas dan terjamin</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Layanan kesehatan lengkap dan profesional</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Pelayanan ramah untuk semua pasien</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center mb-5 g-4">
        <div class="col-lg-7">
            <h2 class="section-title">Tentang Klinik Sehat</h2>
            <p class="section-subtitle">Klinik Sehat hadir untuk memberikan solusi kesehatan yang cepat, aman, dan nyaman bagi seluruh keluarga. Kami fokus pada obat-obatan, layanan medis, serta dukungan kesehatan yang profesional.</p>
        </div>
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Jam Pelayanan</h5>
                    <p class="mb-2"><strong>Senin - Sabtu:</strong> 15.00 - 23.00</p>
                    <p class="mb-0"><strong>Minggu:</strong> 08.00 - 22.00</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5" id="layanan">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4">
                <div class="card-body text-center">
                    <i class="bi bi-capsule-pill text-teal mb-3" style="font-size:2rem; color:#0d9488;"></i>
                    <h5 class="fw-bold">Obat & Vitamin</h5>
                    <p class="text-muted mb-0">Beragam obat, suplemen, dan kebutuhan kesehatan sesuai resep dan kebutuhan Anda.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4">
                <div class="card-body text-center">
                    <i class="bi bi-clipboard2-pulse text-teal mb-3" style="font-size:2rem; color:#0d9488;"></i>
                    <h5 class="fw-bold">Layanan Suntik Pasien</h5>
                    <p class="text-muted mb-0">Pemeriksaan sederhana, konsultasi, dan pelayanan pendukung kesehatan yang nyaman.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4">
                <div class="card-body text-center">
                    <i class="bi bi-heart-pulse-fill text-teal mb-3" style="font-size:2rem; color:#0d9488;"></i>
                    <h5 class="fw-bold">Klinik Sehat</h5>
                    <p class="text-muted mb-0">Tim profesional yang siap membantu menjaga kesehatan Anda dengan pelayanan terbaik.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card contact-card border-0 shadow-sm rounded-4 p-4 mb-5" id="kontak">
        <div class="row g-4 align-items-center">
            <div class="col-lg-8">
                <h4 class="fw-bold mb-2">Hubungi Kami</h4>
                <p class="text-muted mb-0">Untuk informasi obat, layanan, atau reservasi, silakan hubungi kami melalui kontak berikut.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <p class="mb-1"><i class="bi bi-telephone-fill me-2" style="color:#0d9488;"></i>085770162427</p>
                <p class="mb-0"><i class="bi bi-geo-alt-fill me-2" style="color:#0d9488;"></i>Jl. Btn KembangHarum 1</p>
            </div>
        </div>
    </div>

    <form action="<?= base_url('/') ?>" method="get" class="row g-2 mb-4" id="produk">
        <div class="col-12 col-md-6">
            <input type="text" name="keyword" class="form-control" placeholder="Cari obat atau layanan..." value="<?= esc($keyword ?? '') ?>">
        </div>
        <div class="col-8 col-md-4">
            <select name="kategori" class="form-select">
                <option value="">Semua Kategori</option>
                <?php foreach (['Obat', 'Layanan', 'Alat Kesehatan'] as $kat): ?>
                    <option value="<?= $kat ?>" <?= ($kategori ?? '') === $kat ? 'selected' : '' ?>><?= $kat ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-4 col-md-2">
            <button type="submit" class="btn btn-klinik w-100"><i class="bi bi-search"></i> Cari</button>
        </div>
    </form>

    <?php if (empty($produk)): ?>
        <div class="text-center text-muted py-5">
            <i class="bi bi-inbox" style="font-size:3rem;"></i>
            <p class="mt-2">Belum ada obat atau layanan yang tersedia.</p>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($produk as $item): ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="card card-produk h-100">
                        <?php if (!empty($item['gambar'])): ?>
                            <img src="<?= base_url('public/uploads/produk/' . $item['gambar']) ?>" class="card-img-top" alt="<?= esc($item['nama_produk']) ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/400x300?text=Klinik+Sehat" class="card-img-top" alt="Tanpa gambar">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <span class="badge badge-kategori mb-2 align-self-start"><?= esc($item['kategori']) ?></span>
                            <h6 class="card-title fw-bold"><?= esc($item['nama_produk']) ?></h6>
                            <p class="card-text text-muted small flex-grow-1">
                                <?= esc(mb_strimwidth($item['deskripsi'] ?? '-', 0, 80, '...')) ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong class="text-teal" style="color:#0d9488;">Rp <?= number_format((float) $item['harga'], 0, ',', '.') ?></strong>
                                <?php if (!empty($item['id'])): ?>
                                    <a href="<?= base_url('produk/detail/' . $item['id']) ?>" class="btn btn-sm btn-outline-secondary">Detail</a>
                                <?php else: ?>
                                    <a href="#kontak" class="btn btn-sm btn-outline-secondary">Hubungi</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
