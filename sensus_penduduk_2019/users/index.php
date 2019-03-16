<?php
    
    include ($_SERVER['DOCUMENT_ROOT'].'/sensus_penduduk_2019/db/config.php');

    session_start();

    include ($_SERVER['DOCUMENT_ROOT'].'/sensus_penduduk_2019/users/includes/head.php');
    include ($_SERVER['DOCUMENT_ROOT'].'/sensus_penduduk_2019/users/includes/sidebar.php');

    if(!isset($_SESSION['email'])) {

      header('location:../index.php');
    
    }

?>

      <div class="col">
          <div class="row mt-5">
            <div class="col-md-1"></div>
            <div class="col-md-10 mt-5">

                <?php

                  if(isset($_GET['tambah_region'])) {

                    include 'pages/region/tambah_region.php';

                  } else if(isset($_GET['daftar_region'])) {

                    include 'pages/region/daftar_region.php';

                  } else if(isset($_GET['update_region'])) {

                    include 'pages/region/update_region.php';

                  } else if(isset($_GET['delete_region'])) {

                    include 'pages/region/delete_region.php';

                  } else if(isset($_GET['id_region'])) {

                    include 'pages/region/id_region.php';

                  } else if(isset($_GET['update_warga'])) {

                    include 'pages/region/update_warga.php';

                  } else if(isset($_GET['delete_warga'])) {

                    include 'pages/region/delete_warga.php';

                  } else if(isset($_GET['data_penduduk'])) {

                    include 'pages/region/data_penduduk.php';

                      if(isset($_GET['filter_data'])) {

                        include 'pages/region/filter_data.php';

                      }

                  } else {

                    include 'pages/home/index.php';

                  }

                ?>
              
            </div>
            <div class="col-md-1"></div>
          </div>
      </div>

<?php
  
    include ($_SERVER['DOCUMENT_ROOT'].'/sensus_penduduk_2019/users/includes/footer.php');

    mysqli_close($connect_db);

?>