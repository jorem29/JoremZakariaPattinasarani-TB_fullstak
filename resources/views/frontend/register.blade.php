@extends('layouts.log')
@section('login')
<body>
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form id="register-form" action="#" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="name" name="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
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
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>


      </div>
    </div><!-- /.card -->
  </div><!-- /.register-box -->

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    document.getElementById('register-form').addEventListener('submit', function(event) {
      event.preventDefault();

      const name = document.querySelector('input[name="name"]').value;
      const email = document.querySelector('input[name="email"]').value;
      const password = document.querySelector('input[name="password"]').value;
      const password_confirmation = document.querySelector('input[name="password_confirmation"]').value;

      const data = {
        name: name,
        email: email,
        password: password,
        password_confirmation: password_confirmation
      };

      axios.post('http://localhost:8000/api/register', data)
        .then(response => {
            // Tangani respons sukses
            console.log(response.data);
            if (response.data.success) {
            // Pendaftaran berhasil
            console.log('Registration successful. Please login to continue.');
            // Redirect ke halaman login atau halaman yang sesuai
            window.location.href = '/';
            } else {
            // Pendaftaran gagal
            console.log('Registration failed. Please check your information.');
            // Tampilkan pesan error atau lakukan tindakan yang sesuai
            }
        })
        .catch(error => {
            // Tangani kesalahan
            console.error(error);
            // Tampilkan pesan error atau lakukan tindakan yang sesuai
            console.log('An error occurred during registration.');
        });
    });
  </script>
</body>

@endsection