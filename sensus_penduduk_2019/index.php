<?php

  include ($_SERVER['DOCUMENT_ROOT'].'/sensus_penduduk_2019/db/config.php');
  include ($_SERVER['DOCUMENT_ROOT'].'/sensus_penduduk_2019/includes/head.php');

  session_start();

  if(isset($_SESSION['email'])) {

    header('location:users/index.php');
  
  }
  
  if(isset($_POST['login'])) {

    $email_user     = $_POST['email_login'];
    $password_user  = md5($_POST['password_login']);

    $data_user      = mysqli_query($connect_db, "SELECT * FROM users WHERE email = '$email_user' AND password = '$password_user'");

    $check_user     = mysqli_fetch_array($data_user);

      if($email_user == $check_user['email'] && $password_user == $check_user['password']) {

        $_SESSION['email']    = $email_user;
        $_SESSION['pwd_user'] = $password_user;

        header('location:users/index.php');
    
      } else {

        header('location:index.php?error');
    
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
                  Email atau Password yang anda masukkan salah. Mohon coba lagi. 
                </div>
                <?php } ?>

                <div class="card-header">Login</div>
                <div class="card-body">
                  
                  <form method="post">
                    
                    <div class="form-group">
                      <label for="EmailAddress">Email address</label>
                      <input type="email" name="email_login" class="form-control" id="EmailAddress" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    
                    <div class="form-group">
                      <label for="PasswordUser">Password</label>
                      <input type="password" name="password_login" class="form-control" id="PasswordUser" placeholder="Password" minlength="5">
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-primary mb-2 form-control">Login</button>
                    
                    <p>Belum punya akun? <a href="register.php">Daftar di sini &raquo;</a></p>
                  
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