<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Klinik Sehat') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --klinik-primary: #0d9488;
            --klinik-dark: #0f172a;
            --klinik-soft: #ecfeff;
        }
        html { scroll-behavior: smooth; }
        body { background-color: #f8fafc; font-family: 'Segoe UI', Arial, sans-serif; }
        .navbar-brand { font-weight: 700; color: var(--klinik-primary) !important; }
        .btn-klinik { background-color: var(--klinik-primary); color: #fff; border: none; }
        .btn-klinik:hover { background-color: #0b7a70; color: #fff; }
        .hero-klinik {
            background: linear-gradient(135deg, var(--klinik-primary), #14b8a6);
            color: #fff;
            padding: 70px 0;
        }
        .section-title { font-weight: 700; color: var(--klinik-dark); margin-bottom: 12px; }
        .section-subtitle { color: #64748b; max-width: 700px; }
        .card-produk { transition: transform .15s ease, box-shadow .15s ease; border: none; box-shadow: 0 2px 8px rgba(0,0,0,.06); }
        .card-produk:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,.10); }
        .card-produk img { height: 180px; object-fit: cover; }
        .badge-kategori { background-color: var(--klinik-primary); }
        .contact-card { background: linear-gradient(135deg, var(--klinik-soft), white); border: 1px solid #d1fae5; }
        footer { background-color: var(--klinik-dark); color: #cbd5e1; padding: 30px 0; margin-top: 60px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>"><i class="bi bi-heart-pulse-fill"></i> Klinik Sehat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/#layanan') ?>">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/#kontak') ?>">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/login') ?>">Login Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php if (session()->getFlashdata('success')): ?>
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="container mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
<?php endif; ?>

<?= $this->renderSection('content') ?>

<footer>
    <div class="container text-center">
        <small>&copy; <?= date('Y') ?> Klinik Sehat. Semua hak dilindungi.</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
