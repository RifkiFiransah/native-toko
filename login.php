<?php
session_start();
require_once 'function.php';

if (isset($_COOKIE['uniq']) && isset($_COOKIE['keyValue'])) {
  $id  = $_COOKIE['uniq'];
  $user = $_COOKIE['keyValue'];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user='$id'");

  $row = mysqli_fetch_assoc($result);

  if ($user === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
    $_SESSION['role'] = "user";
    $_SESSION['id_user'] = $row['id_user'];
    header("location: index.php");
  }
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      if ($row['role'] == 'user') {
        if (isset($_POST['remember'])) {
          setcookie('uniq', $row['id_user'], time() + 300);
          setcookie('keyValue', hash('sha256', $row['username']), time() + 300);
        }
        $_SESSION['login'] = true;
        $_SESSION['role'] = "user";
        $_SESSION['id_user'] = $row['id_user'];
        header("location: index.php");
        exit;
      } else {
        $_SESSION['login'] = true;
        $_SESSION['role'] = 'admin';
        $_SESSION['id_admin'] = $row['id_user'];
        header("location: dashboard.php");
        exit;
      }
    } else {
      echo "<script>
            alert('username or password incorrect');
        </script>";
    }
  }
  echo "<script>
            alert('username or password incorrect');
        </script>";
  $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body class="bg-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 my-5 border border-info bg-white">
        <div class="login rounded">
          <div class="header p-2">
            <h1 class="text-center">Form Login</h1>
          </div>

          <div class="form-login p-4">
            <div class="row justify-content-center">
              <div class="col-md-10">
                <form action="" class="align-content-center" method="POST">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control bg-transparent" placeholder="Masukan Username Anda" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" required>
                  </div>
                  <input type="checkbox" name="remember" id="remember">
                  <label for="remember">Remember Me?</label>

                  <button type="submit" class="btn btn-primary form-control my-2" name="login">Masuk</button>
                  <p class="text-center mt-3">Belum punya akun? <a href="registrasi.php">Registrasi</a></p>
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