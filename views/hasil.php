<div class="container" id="hasilData">
  <div class="card shadow-sm mt-4">
    <div class="card-body">
      <h4 class="mb-3 text-primary">Hasil Data Warga</h4>

      <div class="row g-3">
        <div class="col-md-6">
          <p><strong>Nama:</strong> <?= htmlspecialchars($nama ?? '') ?></p>
          <p><strong>Umur:</strong> <?= htmlspecialchars($umur ?? '') ?></p>
          <p><strong>Kategori:</strong> <?= htmlspecialchars($kategori ?? '') ?></p>
          <p><strong>Keterangan:</strong> <?= htmlspecialchars($keterangan ?? '-') ?></p>
          <p><strong>Alamat:</strong> <?= htmlspecialchars($alamat ?? '-') ?></p>
          <p><strong>Jenis Kelamin:</strong> <?= htmlspecialchars($jk ?? '-') ?></p>
          <p><strong>Hobi:</strong> <?= htmlspecialchars($hobi ?? '-') ?></p>
          <p><strong>Provinsi:</strong> <?= htmlspecialchars($provinsi ?? '-') ?></p>
          <p><strong>Kabupaten:</strong> <?= htmlspecialchars($kabupaten ?? '-') ?></p>
        </div>

        <div class="col-md-6 text-center">
          <?php if (!empty($foto)) : ?>
            <p><strong>Foto:</strong></p>
            <img src="<?= htmlspecialchars($foto) ?>" alt="Foto Warga" class="img-thumbnail mb-3" width="200">
          <?php endif; ?>

          <?php if (!empty($tanda_tangan)) : ?>
            <p><strong>Tanda Tangan:</strong></p>
            <img src="<?= htmlspecialchars($tanda_tangan) ?>" alt="Tanda Tangan" class="img-thumbnail" width="200">
          <?php endif; ?>
        </div>
      </div>

      <div class="text-center mt-4">
        <a href="index.php?url=warga/form" class="btn btn-secondary me-2">Kembali ke Form</a>
        <button class="btn btn-success btn-export" id="btnExcel">Export Excel</button>
        <button class="btn btn-danger btn-export" id="btnPDF">Export PDF</button>
        <button class="btn btn-primary btn-export" onclick="window.print()">Print</button>
      </div>
    </div>
  </div>
</div>
