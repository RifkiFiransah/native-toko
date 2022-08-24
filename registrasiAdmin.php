<?php
require_once "function.php";

if (isset($_POST['registrasi'])) {
  if (registrasiAdmin($_POST) > 0) {
    echo "<script>
          alert('User baru berhasil ditambahkan');
        </script>";
    return header("location: login.php");
  } else {
    echo mysqli_error($conn);
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 my-5 border border-info">
        <div class="login rounded">
          <div class="header p-2">
            <h1 class="text-center">Form Registrasi</h1>
          </div>

          <div class="form-login p-3">
            <div class="row justify-content-center mb-3">
              <div class="col-md-10">
                <form action="" class="align-content-center" method="POST">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control bg-transparent" placeholder="Masukan Username Anda">
                  </div>
                  <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control bg-transparent" placeholder="Masukan Nama Lengkap Anda">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                  </div>
                  <!-- <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                      <option value="admin">admin</option>
                      <option value="user">user</option>
                    </select>
                  </div> -->

                  <button type="submit" class="btn btn-primary form-control my-2" name="registrasi">Register</button>
                  <p class="text-center mt-2">sudah punya akun? <a href="login.php">Login</a></p>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>