<div class="row" id="body-row">
      <div id="sidebar-container" class="sidebar-expanded d-md-block">
          <ul class="list-group">
              <li class="list-group-item sidebar-separator-title text-light d-block align-items-center">
                  <small>Hai, Welcome</small>
                  <p class="text-info my-3"><?php echo $_SESSION['email'] ?></p>
                  <button type="button" class="btn btn-danger"><a href="logout.php">Logout &raquo;</a></button>
              </li>
              <a href="index.php" class="bg-dark list-group-item list-group-item-action"><i class="fas fa-home mr-2"></i> Home</a>

              <a href="#Submenu_Region" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action">
                  <div class="d-flex align-items-center">
                      <span><i class="fas fa-map mr-2"></i> Region</span>
                  </div>
              </a>
              <div id='Submenu_Region' class="collapse sidebar-submenu">
                  <a href="index.php?tambah_region" class="list-group-item list-group-item-action bg-light text-dark">
                      <span><i class="fas fa-plus mr-2"></i> Tambah Region</span>
                  </a>
                  <a href="index.php?daftar_region" class="list-group-item list-group-item-action bg-light text-dark">
                      <span><i class="fas fa-list"></i> Daftar Region</span>
                  </a>
              </div>

              <a href="index.php?data_penduduk" class="bg-dark list-group-item list-group-item-action"><i class="fas fa-users mr-2"></i> Data Penduduk</a>          
          </ul>
      </div>