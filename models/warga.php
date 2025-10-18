<?php
class Warga extends Database {

  public function simpan($data) {
    $conn = $this->getConn();
    $stmt = $conn->prepare("INSERT INTO warga (nama, umur, kategori, keterangan, alamat, jk, hobi, provinsi, kabupaten, foto, tanda_tangan)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
      "sisssssssss",
      $data['nama'],
      $data['umur'],
      $data['kategori'],
      $data['keterangan'],
      $data['alamat'],
      $data['jk'],
      $data['hobi'],
      $data['provinsi'],
      $data['kabupaten'],
      $data['foto'],
      $data['tanda_tangan']
    );
    $stmt->execute();
    $stmt->close();
  }

  public function semua() {
    $conn = $this->getConn();
    $result = $conn->query("SELECT * FROM warga ORDER BY id DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}
