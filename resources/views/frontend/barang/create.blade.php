@extends('layouts.das')
@section('content')
<section class="content">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Barang</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-6">
          <a href="/barang-index" class="btn btn-secondary">Cancel</a>
          <button type="button" class="btn btn-success float-right" onclick="createBarang()">Create</button>
        </div>
      </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  function createBarang() {
    // Mengambil nilai input nama_barang
    var namaBarang = document.getElementById('nama_barang').value;

    // Menyiapkan data yang akan dikirimkan ke API
    var data = {
      nama_barang: namaBarang
    };

    // Mengirim data ke API menggunakan Axios
    axios.post('http://localhost:8000/api/barang', data)
      .then(function(response) {
        console.log(response.data); // Tampilkan respon dari API jika berhasil
        alert('Barang berhasil dibuat'); // Tampilkan pesan sukses
        window.location.href = '/barang-index'; // Redirect ke halaman daftar barang
      })
      .catch(function(error) {
        console.log(error.response.data); // Tampilkan error jika terjadi masalah
        alert('Gagal membuat barang. Silakan coba lagi.'); // Tampilkan pesan error
      });
  }
</script>

@endsection