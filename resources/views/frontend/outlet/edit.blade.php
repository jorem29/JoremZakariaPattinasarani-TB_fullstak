@extends('layouts.das')

@section('content')
<section class="content">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Edit Outlet</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputEstimatedBudget">Nama Outlet</label>
            <input type="text" id="nama_outlet" class="form-control">
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-6">
      <a href="/outlet-index" class="btn btn-secondary">Cancel</a>
      <button type="button" class="btn btn-success float-right" onclick="updateBarang()">Update</button>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  // Ambil ID barang yang ingin diedit dari URL
  const urlParams = new URLSearchParams(window.location.search);
  const barangId = urlParams.get('id');

  // Ambil data barang dari API
  axios.get(`http://localhost:8000/api/outlet/${barangId}`)
    .then(response => {
      const data = response.data;

      // Mengisi nilai input dengan data yang diterima
      document.getElementById('nama_outlet').value = data.nama_outlet;
    })
    .catch(error => {
      console.error(error);
    });

  function updateBarang() {
    // Mengambil nilai input nama_barang
    var namaBarang = document.getElementById('nama_outlet').value;

    // Menyiapkan data yang akan dikirimkan ke API
    var data = {
      nama_outlet: namaBarang
    };

    // Mengirim data ke API menggunakan Axios
    axios.put(`http://localhost:8000/api/outlet/${barangId}`, data)
      .then(function(response) {
        console.log(response.data); // Tampilkan respon dari API jika berhasil
        alert('Barang berhasil diupdate'); // Tampilkan pesan sukses
        window.location.href = '/outlet-index'; // Redirect ke halaman daftar barang
      })
      .catch(function(error) {
        console.log(error.response.data); // Tampilkan error jika terjadi masalah
        alert('Gagal mengupdate outlet. Silakan coba lagi.'); // Tampilkan pesan error
      });
  }
</script>
@endsection
