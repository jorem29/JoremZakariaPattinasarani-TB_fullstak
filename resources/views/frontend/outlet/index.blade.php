@extends('layouts.das')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable Outlet</h3>
              <div class="float-right">
                <a href="/outlet-create" class="btn btn-primary">Create Outlet</a>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Outlet</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
  // Ambil referensi tabel menggunakan ID
  const table = document.getElementById('example1');

  // Ambil data dari API barang
  axios.get('http://localhost:8000/api/outlet')
    .then(response => {
      const data = response.data;

      // Loop melalui data dan tambahkan baris baru ke dalam tabel
      data.forEach(item => {
        const row = table.insertRow();
        // Tambahkan data ke dalam kolom pada baris yang sesuai
        const namaBarangCell = row.insertCell();
        namaBarangCell.textContent = item.nama_outlet;

        // Tambahkan kolom "Action" dengan tombol "Edit" dan "Delete"
        const actionCell = row.insertCell();
        actionCell.innerHTML = `
          <button class="btn btn-danger" onclick="deleteBarang(${item.id})">Delete</button>
        `;

      
      });

      // Inisialisasi DataTables pada tabel setelah data ditambahkan
      $(table).DataTable();
    })
    .catch(error => {
      console.error(error);
    });

    function deleteBarang(id) {
    // Tampilkan konfirmasi penghapusan
    if (confirm('Apakah Anda yakin ingin menghapus outlet ini?')) {
      // Kirim permintaan DELETE ke API menggunakan Axios
      axios.delete(`http://localhost:8000/api/outlet/${id}`)
        .then(response => {
          console.log(response.data); // Tampilkan respon dari API jika berhasil
          alert('Outlet berhasil dihapus'); // Tampilkan pesan sukses
          // Refresh halaman untuk memperbarui tabel
          location.reload();
        })
        .catch(error => {
          console.error(error);
          alert('Gagal menghapus outlet. Silakan coba lagi.'); // Tampilkan pesan error
        });
    }
  }
</script>


@endsection