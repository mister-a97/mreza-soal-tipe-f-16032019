<?php

  include ($_SERVER['DOCUMENT_ROOT'].'/sensus_penduduk_2019/db/config.php');
  include ($_SERVER['DOCUMENT_ROOT'].'/sensus_penduduk_2019/includes/head.php');

  session_start();

  if(isset($_SESSION['email'])) {

    header('location:users/index.php');
  
  }
  
  if(isset($_POST['register'])) {

    $email_user     = $_POST['register_email'];
    $password_user  = md5($_POST['register_password']);
    $date_time      = date('Y-m-d H:i:s');

    $duplicate_user      = mysqli_query($connect_db, "SELECT * FROM users WHERE email = '$email_user'");
    
    $check_duplicate     = mysqli_num_rows($duplicate_user);

      if($check_duplicate > 0) {

        header('location:register.php?duplicate_email');
      
      } else {

        if($email_user != '' && $password_user != '') {

          //proses input

          mysqli_query($connect_db, "INSERT INTO users VALUES('', '$email_user', '$password_user', '$date_time')");

          header('location:register.php?success');

        } else {

          header('location:register.php?error');
        }
      
      }
  }

?>

    <div class="container mt-5">
      <div class="row">
        
        <div class="col-md-3"></div>
        
        <div class="col-sm-6">
              <div class="card">

                <?php if(isset($_GET['error'])) {?>
                <div class="alert alert-danger" role="alert">
                  Untuk mendaftar harap masukkan Email dan Password.
                </div>
                <?php } else if(isset($_GET['success'])) {?>
                <div class="alert alert-success" role="alert">
                  Anda berhasil melakukan pendaftaran. Silahkan <a href="index.php">login di sini.</a> 
                </div>
                <?php } else if(isset($_GET['duplicate_email'])) {?>
                <div class="alert alert-danger" role="alert">
                  Email sudah digunakkan. Silahkan menggunakkan email yang lainnya.
                </div>
                <?php }?>

                <div class="card-header">Daftar User Baru</div>
                <div class="card-body">
                  
                  <form method="post">
                    
                    <div class="form-group">
                      <label for="EmailAddress">Email address</label>
                      <input type="email" name="register_email" class="form-control" id="EmailAddress" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    
                    <div class="form-group">
                      <label for="PasswordUser">Password</label>
                      <input type="password" name="register_password" class="form-control" id="PasswordUser" placeholder="Password" minlength="5">
                    </div>
                    
                    <button type="submit" name="register" class="btn btn-primary mb-2 form-control">Register</button>

                    <p>Sudah punya akun? <a href="index.php">Login di sini &raquo;</a></p>
                  
                  </form>

                </div>
              </div>
          </div>
          
          <div class="col-md-3"></div>
      
      </div>
    </div>

<?php

  include ($_SERVER['DOCUMENT_ROOT'].'/sensus_penduduk_2019/includes/footer.php');

  mysqli_close($connect_db);

?>