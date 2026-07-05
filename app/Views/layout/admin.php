<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Klinik') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --klinik-primary: #0d9488; }
        body { background-color: #f1f5f9; }
        .sidebar {
            min-height: 100vh;
            background-color: #0f172a;
        }
        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 8px;
        }
        .sidebar a.active, .sidebar a:hover { background-color: var(--klinik-primary); color: #fff; }
        .sidebar-brand { color: #fff; font-weight: 700; padding: 20px; font-size: 1.2rem; }
        .btn-klinik { background-color: var(--klinik-primary); color: #fff; border: none; }
        .btn-klinik:hover { background-color: #0b7a70; color: #fff; }
        .thumb-produk { width: 60px; height: 60px; object-fit: cover; border-radius: 6px; }
        @media (max-width: 767px) {
            .sidebar { min-height: auto; }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-md-block sidebar p-0">
            <div class="sidebar-brand"><i class="bi bi-heart-pulse-fill"></i> Klinik Admin</div>
            <div class="px-2">
                <a href="<?= base_url('admin/produk') ?>" class="active"><i class="bi bi-box-seam"></i> Kelola Produk</a>
                <a href="<?= base_url('/') ?>" target="_blank"><i class="bi bi-eye"></i> Lihat Situs</a>
                <a href="<?= base_url('admin/logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto px-md-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0"><?= esc($title ?? '') ?></h4>
                <span class="text-muted">Halo, <?= esc(session()->get('nama') ?? 'Admin') ?></span>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $err): ?>
                            <li><?= esc($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
