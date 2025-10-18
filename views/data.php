<div class="container">
  <div class="card shadow-sm mt-4">
    <div class="card-body">
      <h4 class="mb-3 text-primary">Data Warga Terdaftar</h4>
      <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-striped align-middle">
          <thead class="table-primary text-center">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Umur</th>
              <th>Kategori</th>
              <th>Alamat</th>
              <th>Jenis Kelamin</th>
              <th>Hobi</th>
              <th>Provinsi</th>
              <th>Kabupaten</th>
              <th>Foto</th>
              <th>Tanda Tangan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            if (!empty($result)) :
              foreach ($result as $row) :
            ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($row['nama']) ?></td>
                  <td><?= htmlspecialchars($row['umur']) ?></td>
                  <td><?= htmlspecialchars($row['kategori']) ?></td>
                  <td><?= htmlspecialchars($row['alamat']) ?></td>
                  <td><?= htmlspecialchars($row['jk']) ?></td>
                  <td><?= htmlspecialchars($row['hobi']) ?></td>
                  <td><?= htmlspecialchars($row['provinsi']) ?></td>
                  <td><?= htmlspecialchars($row['kabupaten']) ?></td>
                  <td class="text-center">
                    <?php if (!empty($row['foto'])) : ?>
                      <img src="<?= htmlspecialchars($row['foto']) ?>" alt="Foto" width="60" class="img-thumbnail">
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php if (!empty($row['tanda_tangan'])) : ?>
                      <img src="<?= htmlspecialchars($row['tanda_tangan']) ?>" alt="Tanda" width="60" class="img-thumbnail">
                    <?php endif; ?>
                  </td>
                </tr>
            <?php
              endforeach;
            else :
            ?>
              <tr>
                <td colspan="11" class="text-center text-muted">Belum ada data warga.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="text-center mt-3">
        <a href="index.php?url=warga/form" class="btn btn-primary">Tambah Data Baru</a>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
