<div class="container">
  <div class="stiker-header text-center mb-4">
    <h2>KEMENTRIAN KEPENDUDUKAN</h2>
    <p>Direktorat Jenderal Data dan Informasi Kependudukan</p>
    <hr style="width:60%; margin:auto; border:2px solid #0d6efd; border-radius:5px;">
  </div>

  <div class="card mb-4 shadow-sm">
    <div class="card-body">
      <h5 class="mb-3 fw-bold">Form Pengisian Data Warga Negara</h5>
      <form id="demoForm" method="POST" action="index.php?url=warga/simpan" enctype="multipart/form-data">
        <div class="row g-3 mt-1">

          <div class="col-md-4">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
              <option value="">-- Pilih --</option>
              <option value="Pelajar">Pelajar</option>
              <option value="Mahasiswa">Mahasiswa</option>
              <option value="Karyawan">Karyawan</option>
            </select>
          </div>

          <div class="col-md-6" id="extraField" style="display:none;">
            <label id="extraLabel" class="form-label"></label>
            <input type="text" class="form-control" id="extraInput" name="keterangan">
          </div>

          <div class="col-md-6">
            <label class="form-label">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat" name="alamat"></textarea>
          </div>

          <div class="col-md-6">
            <label class="form-label">Jenis Kelamin</label><br>
            <input type="radio" name="jk" value="Laki-laki"> Laki-laki
            <input type="radio" name="jk" value="Perempuan" class="ms-3"> Perempuan
          </div>

          <div class="col-md-6">
            <label class="form-label">Hobi</label><br>
            <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga
            <input type="checkbox" name="hobi[]" value="Membaca" class="ms-3"> Membaca
            <input type="checkbox" name="hobi[]" value="Musik" class="ms-3"> Musik
          </div>

          <div class="col-md-6">
            <label class="form-label">Upload Foto</label>
            <input id="foto" class="form-control" type="file" name="foto" accept="image/*">
          </div>

          <div class="col-md-6">
            <label class="form-label">Provinsi</label>
            <select class="form-select" id="provinsi" name="provinsi"></select>
            <input type="hidden" id="provinsi_text" name="provinsi_text">
          </div>

          <div class="col-md-6">
            <label class="form-label">Kabupaten / Kota</label>
            <select class="form-select" id="kabupaten" name="kabupaten"></select>
            <input type="hidden" id="kabupaten_text" name="kabupaten_text">
          </div>

          <div class="col-12">
            <label class="form-label">Tanda Tangan</label><br>
            <canvas id="myCanvas" width="600" height="200" style="border:1px solid #ccc;"></canvas>
            <input type="hidden" name="tanda_tangan" id="tanda_tangan">
            <div class="text-end mt-2">
              <button type="button" id="clearCanvas" class="btn btn-warning me-2">Hapus</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
