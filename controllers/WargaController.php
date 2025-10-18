<?php
class WargaController extends Controller {
  private $model;

  public function __construct() {
    $this->model = $this->model('Warga');
  }
  
  public function form() {
    $this->view('form');
  }

  public function simpan() {
    $uploadDir = 'public/uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    $fotoPath = '';
    if (!empty($_FILES['foto']['name'])) {
      $fotoName = time() . '_' . basename($_FILES['foto']['name']);
      $targetFile = $uploadDir . $fotoName;
      if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
        $fotoPath = $targetFile;
      }
    }

    $data = [
      'nama' => $_POST['nama'] ?? '',
      'umur' => $_POST['umur'] ?? '',
      'kategori' => $_POST['kategori'] ?? '',
      'keterangan' => $_POST['keterangan'] ?? '',
      'alamat' => $_POST['alamat'] ?? '',
      'jk' => $_POST['jk'] ?? '',
      'hobi' => isset($_POST['hobi']) ? implode(', ', $_POST['hobi']) : '',
      'provinsi' => $_POST['provinsi_text'] ?? '',
      'kabupaten' => $_POST['kabupaten_text'] ?? '',
      'foto' => $fotoPath,
      'tanda_tangan' => $_POST['tanda_tangan'] ?? ''
    ];

    $this->model->simpan($data);
    $this->view('hasil', $data);
  }

  public function data() {
    $result = $this->model->semua();
    $this->view('data', ['result' => $result]);
  }
}
