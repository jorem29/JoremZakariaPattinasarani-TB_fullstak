@extends('layouts.das')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable Survey</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Nama_Barang</th>
                    <th>Nama_Outlet</th>
                    <th>Jumlah_Stok</th>
                    <th>Jumlah_Display</th>
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
  axios.get('http://localhost:8000/api/survey')
    .then(response => {
      const data = response.data;

      // Loop melalui data dan tambahkan baris baru ke dalam tabel
      data.forEach(item => {
        const row = table.insertRow();
        // Tambahkan data ke dalam kolom pada baris yang sesuai
        const namaUserCell = row.insertCell();
        const userId = item.user_id;
        // Permintaan HTTP untuk mendapatkan informasi pengguna berdasarkan user_id
        axios.get(`http://localhost:8000/api/userid/${userId}`)
        .then(userResponse => {
          const userData = userResponse.data;
          namaUserCell.textContent = userData.name;
        })
        .catch(error => {
          console.error(error);
          namaUserCell.textContent = 'Error';
        });

        const namaBarangCell = row.insertCell();
        const barangId = item.barang_id;
        axios.get(`http://localhost:8000/api/barang/${barangId}`)
        .then(barangResponse => {
          const barangData = barangResponse.data;
          namaBarangCell.textContent = barangData.nama_barang;
        })
        .catch(error => {
          console.error(error);
          namaBarangCell.textContent = 'Error';
        });
        const namaOutletCell = row.insertCell();
        const outletId = item.outlet_id;
        axios.get(`http://localhost:8000/api/outlet/${outletId}`)
        .then(outletResponse => {
            const outletData = outletResponse.data;
            namaOutletCell.textContent = outletData.nama_outlet;
        })
        .catch(error =>{
            console.error(error);
            namaOutletCell.textContent = 'Error';
        });

        const JumlahCell = row.insertCell();
        JumlahCell.textContent = item.jumlah_stok;
        const DisplayCell = row.insertCell();
        DisplayCell.textContent = item.jumlah_display;

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
      axios.delete(`http://localhost:8000/api/survey/${id}`)
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