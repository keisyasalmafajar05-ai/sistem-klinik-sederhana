<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Klinik Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #0d9488, #0f172a);
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card { border: none; border-radius: 20px; box-shadow: 0 12px 40px rgba(0,0,0,.25); }
        .btn-klinik { background-color: #0d9488; color: #fff; border: none; }
        .btn-klinik:hover { background-color: #0b7a70; color: #fff; }
        .info-box { background: #f8fafc; border-radius: 16px; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center align-items-center g-4">
        <div class="col-lg-6">
            <div class="info-box p-4 p-md-5">
                <div class="text-center mb-4">
                    <i class="bi bi-heart-pulse-fill" style="font-size:2.5rem; color:#0d9488;"></i>
                    <h2 class="fw-bold mt-2 mb-1">Klinik Sehat</h2>
                    <p class="text-muted mb-0">Sistem admin untuk mengelola obat, layanan, dan data klinik dengan cepat.</p>
                </div>
                <div class="row g-3">
                    <div class="col-sm-4 text-center">
                        <div class="p-3 rounded-3 bg-white shadow-sm">
                            <i class="bi bi-capsule-pill text-teal" style="font-size:1.4rem; color:#0d9488;"></i>
                            <div class="small mt-2 fw-semibold">Obat</div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="p-3 rounded-3 bg-white shadow-sm">
                            <i class="bi bi-clipboard2-pulse text-teal" style="font-size:1.4rem; color:#0d9488;"></i>
                            <div class="small mt-2 fw-semibold">Layanan</div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="p-3 rounded-3 bg-white shadow-sm">
                            <i class="bi bi-hospital text-teal" style="font-size:1.4rem; color:#0d9488;"></i>
                            <div class="small mt-2 fw-semibold">Klinik</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card login-card p-4">
                <div class="text-center mb-3">
                    <h4 class="mb-0">Login Admin</h4>
                    <small class="text-muted">Masuk untuk mengelola sistem</small>
                </div>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <form action="<?= base_url('admin/login') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-klinik w-100">Masuk</button>
                </form>
                <div class="text-center mt-3">
                    <a href="<?= base_url('/') ?>" class="text-muted small"><i class="bi bi-arrow-left"></i> Kembali ke situs</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
