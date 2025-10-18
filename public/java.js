$(document).ready(function () {
  $('#kategori').on('change', function () {
    const val = $(this).val();
    const extraDiv = $('#extraField');
    const extraLabel = $('#extraLabel');
    if (val === 'Mahasiswa') { extraDiv.show(); extraLabel.text("Nama Universitas"); }
    else if (val === 'Pelajar') { extraDiv.show(); extraLabel.text("Nama Sekolah"); }
    else if (val === 'Karyawan') { extraDiv.show(); extraLabel.text("Nama Perusahaan"); }
    else { extraDiv.hide(); $('#extraInput').val(""); }
  });

  $.ajax({
    url: 'https://api.datawilayah.com/api/provinsi.json',
    method: 'GET',
    dataType: 'json',
    success: function (res) {
      const provSelect = $('#provinsi');
      provSelect.append('<option value="">-- Pilih Provinsi --</option>');
      res.data.forEach(p => provSelect.append(`<option value="${p.kode_wilayah}">${p.nama_wilayah}</option>`));
    }
  });

  $('#provinsi').on('change', function () {
    const kodeProv = $(this).val();
    const namaProv = $('#provinsi option:selected').text();
    $('#provinsi_text').val(namaProv);
    $.ajax({
      url: `https://api.datawilayah.com/api/kabupaten_kota/${kodeProv}.json`,
      method: 'GET',
      dataType: 'json',
      success: function (res) {
        const kabSelect = $('#kabupaten');
        kabSelect.empty().append('<option value="">-- Pilih Kabupaten / Kota --</option>');
        res.data.forEach(k => kabSelect.append(`<option value="${k.kode_wilayah}">${k.nama_wilayah}</option>`));
      }
    });
  });

  $('#kabupaten').on('change', function () {
    const namaKab = $('#kabupaten option:selected').text();
    $('#kabupaten_text').val(namaKab);
  });

  const canvas = document.getElementById('myCanvas');
  const ctx = canvas.getContext('2d');
  let drawing = false;

  canvas.addEventListener('mousedown', () => drawing = true);
  canvas.addEventListener('mouseup', () => { drawing = false; ctx.beginPath(); });
  canvas.addEventListener('mousemove', e => {
    if (!drawing) return;
    ctx.lineWidth = 2;
    ctx.lineCap = 'round';
    ctx.strokeStyle = 'black';
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(e.offsetX, e.offsetY);
  });

  $('#clearCanvas').on('click', () => ctx.clearRect(0, 0, canvas.width, canvas.height));

  $('#demoForm').on('submit', function () {
    $('#tanda_tangan').val(canvas.toDataURL("image/png"));
  });

  $(document).ready(function() {
    $('#tabelWarga').DataTable({
        dom: 'Bfrtip',
        buttons: ['csv', 'excel', 'pdf', 'print'],
        pageLength: 10, 
        searching: true, 
        language: {
        search: "Cari Data:",
        lengthMenu: "Tampilkan _MENU_ data per halaman",
        info: "Menampilkan halaman _PAGE_ dari _PAGES_",
        zeroRecords: "Data tidak ditemukan",
        infoEmpty: "Tidak ada data tersedia"
        }
        });
    });
});

$(document).ready(function () {

  if ($('#hasilData').length) {

    $('#btnExcel').on('click', function () {
      const element = document.getElementById('hasilData');
      const wb = XLSX.utils.table_to_book(element, { sheet: "Data Warga" });
      XLSX.writeFile(wb, "Data_Warga.xlsx");
    });

    $('#btnPDF').on('click', function () {
      const element = document.getElementById("hasilData");
      const opt = {
        margin: 0.5,
        filename: 'Data_Warga.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
      };
      html2pdf().set(opt).from(element).save();
    });
  }
});

// function exportToExcel() {
//   const table = document.querySelector("#hasilData table");
//   const wb = XLSX.utils.table_to_book(table, {sheet:"Data Warga"});
//   XLSX.writeFile(wb, "Data_Warga.xlsx");
// }

// function exportToPDF() {
//   const element = document.getElementById("hasilData");
//   const opt = {
//     margin:       0.5,
//     filename:     'Data_Warga.pdf',
//     image:        { type: 'jpeg', quality: 0.98 },
//     html2canvas:  { scale: 2 },
//     jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
//   };
//   html2pdf().set(opt).from(element).save();
// }