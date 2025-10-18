<?php
$isRegister = ($mode === 'register');
$title = $isRegister ? 'Daftar Akun Baru' : 'Login Sistem Kependudukan';
$action = $isRegister ? 'index.php?url=auth/simpanRegister' : 'index.php?url=auth/login';
$buttonText = $isRegister ? 'Daftar' : 'Masuk';
$buttonClass = $isRegister ? 'btn-success' : 'btn-primary';
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-lg p-4">
        <div class="text-center mb-3">
          <img src="public/ab.png" alt="logo" width="70">
          <h4 class="mt-2 text-primary fw-bold"><?= $title ?></h4>
        </div>

        <?php if (isset($error)): ?>
          <div class="alert alert-danger text-center"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= $action ?>">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <button type="submit" class="btn <?= $buttonClass ?> w-100"><?= $buttonText ?></button>
        </form>

        <hr>
        <p class="text-center small">
          <?php if ($isRegister): ?>
            Sudah punya akun? 
            <a href="index.php?url=auth/login" class="text-decoration-none">Login di sini</a>
          <?php else: ?>
            Belum punya akun?
            <a href="index.php?url=auth/register" class="text-decoration-none">Daftar sekarang</a>
          <?php endif; ?>
        </p>
      </div>
    </div>
  </div>
</div>
