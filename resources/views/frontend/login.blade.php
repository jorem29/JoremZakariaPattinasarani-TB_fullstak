@extends('layouts.log')
@section('login')
<div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form id="login-form" action="#" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-success btn-block">Sign In</button>
            </div>
            <div class="col-4">
              <a href="/register">Belum Daftar?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    document.getElementById('login-form').addEventListener('submit', function(event) {
      event.preventDefault();

      const email = document.querySelector('input[name="email"]').value;
      const password = document.querySelector('input[name="password"]').value;

      const data = {
        email: email,
        password: password
      };

      axios.post('http://localhost:8000/api/login', data)
        .then(response => {
          // Tangani respons sukses
          console.log(response.data);
          // Simpan token autentikasi ke session atau cookie
          const token = response.data.token;
          sessionStorage.setItem('auth_token', token);
          // Redirect ke halaman dashboard atau halaman yang sesuai
          window.location.href = '/dashboard';
        })
        .catch(error => {
          // Tangani kesalahan
          console.error(error);
          // Tampilkan pesan error atau lakukan tindakan yang sesuai
          console.log('Login failed. Please check your credentials.');
        });
    });
  </script>

@endsection