<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Research Portal | Dashboard</title>
  <?php include_once('headers.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown ">
          <a class="nav-link user-panel d-flex align-items-center" data-toggle="dropdown" href="#">
            <img src="../assets/icon.png" class="img-circle mr-2" alt="User Image">
            <span class="text-gray"><?= $user_name ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <button class="dropdown-item" data-toggle="modal" data-target="#user-settings">
              <i class="fas fa-cog mr-2"></i>Settings
            </button>
            <div class="dropdown-divider"></div>
            <a href="../wp-includes/logout.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i>Logout
            </a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-2">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../assets/icon.png" alt="Research Logo" class="brand-image img-circle" />
        <span class="brand-text font-weight-light">Research Portal</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="../wp-admin/" class="nav-link active bg-gradient-primary">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-header">Manage</li>
            <li class="nav-item">
              <a href="users.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="category.php" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="files.php" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Files</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-gradient-success">
                <div class="inner">
                  <?php $user_query = $conn->query("SELECT * FROM tbl_users"); ?>
                  <h3><?= $user_query->num_rows ?></h3>

                  <p>Total Users</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-gradient-info">
                <div class="inner">
                  <?php $file_query = $conn->query("SELECT * FROM tbl_files"); ?>
                  <h3><?= $file_query->num_rows ?></h3>
                  <p>Total Files</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-gradient-danger">
                <div class="inner">
                  <?php $category_query = $conn->query("SELECT * FROM tbl_category"); ?>
                  <h3><?= $category_query->num_rows ?></h3>

                  <p>Total Category</p>
                </div>
                <div class="icon">
                  <i class="fas fa-box"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-8">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h1 class="card-title">
                    <i class="fa fa-users"></i>
                    Latest Users
                  </h1>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <table id="table" class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>LRN/EMPLOYEE Code</th>
                        <th>Name</th>
                        <th>Role</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      $latest_query = $conn->query("SELECT * FROM tbl_users ORDER BY _id ASC");
                      $counter = 0;
                      foreach ($latest_query as $latest_row) {
                        ++$counter;
                        echo ('
                        <tr>
                          <td>' . $counter . '</td>
                          <td>' . $latest_row['user_id'] . '</td>
                          <td>' . $latest_row['first_name'] . ' - ' . $latest_row['last_name'] . '</td>
                          <td>' . $latest_row['role'] . '</td>
                        </tr>
                        ');
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </section>

            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    include_once("footer.php");
    ?>
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="../wp-plugins/jquery/jquery.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!-- Bootstrap 4 -->
  <script src="../wp-plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../wp-plugins/dist/js/adminlte.js"></script>
  <script src="../wp-plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../wp-plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../wp-plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <?php
  include_once("../wp-includes/response.php");
  include_once("admin-modal.php");
  ?>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
    
    $("#table").DataTable();
    $("#table-search").DataTable({
      paging: true,
      lengthChange: false,
      searching: false,
      ordering: true,
      info: true,
      autoWidth: false,
    });

    $("#table-2").DataTable();
    $("#table-search").DataTable({
      paging: true,
      lengthChange: false,
      searching: false,
      ordering: true,
      info: true,
      autoWidth: false,
    });
  </script>
</body>

</html>