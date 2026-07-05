<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Klinik Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0d9488, #0f172a);
            margin: 0;
            padding: 20px;
        }
        .card {
            width: 100%;
            max-width: 460px;
            border-radius: 20px;
            box-shadow: 0 12px 40px rgba(0,0,0,.25);
            border: none;
        }
        .btn-klinik { background-color: #0d9488; color: #fff; border: none; }
        .btn-klinik:hover { background-color: #0b7a70; color: #fff; }
    </style>
</head>
<body>
    <div class="card p-4 p-md-5">
        <div class="text-center mb-4">
            <i class="bi bi-heart-pulse-fill" style="font-size:2.5rem; color:#0d9488;"></i>
            <h2 class="fw-bold mt-2 mb-1">Klinik Sehat</h2>
            <p class="text-muted mb-0">Login admin untuk mengelola obat, layanan, dan data klinik.</p>
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
                <input type="text" name="username" value="<?= old('username') ?>" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-klinik w-100">Login</button>
        </form>
        <div class="text-center mt-3">
            <a href="<?= base_url('/') ?>" class="text-muted small"><i class="bi bi-arrow-left"></i> Kembali ke halaman utama</a>
        </div>
    </div>
</body>
</html>