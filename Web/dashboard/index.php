<?php
include_once('../wp-includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Research | Dashboard</title>
  <?php include_once('headers.php'); ?>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="/" class="navbar-brand">
          <img src="../assets/icon.png" alt="Research Portal Logo" class="brand-image img-circle" style="opacity: .8">
          <span class="brand-text font-weight-light">Research Portal</span>
        </a>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="teachers.php" class="nav-link">Teacher</a>
            </li>
            <li class="nav-item">
              <a href="students.php" class="nav-link">Student</a>
            </li>
            <li class="nav-item dropdown user-small d-none">
              <a class="nav-link user-panel d-flex align-items-center" data-toggle="dropdown" href="#">
                <img src="../wp-images/<?= $avatar ?>" class="img-circle" alt="User Image">
                <span class="text-gray"><?= $user_name ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <?php
              if ($role == 'administrator') {
              ?>
                <a class="dropdown-item" href="../wp-admin/">
                  <i class="fas fa-user-shield mr-2"></i>Admin Panel
                </a>
                <div class="dropdown-divider"></div>
              <?php
              }
              ?>
                <button class="dropdown-item" data-toggle="modal" data-target="#user-settings">
                  <i class="fas fa-cog mr-2"></i>Settings
                </button>
                <div class="dropdown-divider"></div>
                <a href="../wp-includes/logout.php" class="dropdown-item btn-danger">
                  <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </a>
              </div>
            </li>
          </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item dropdown user-large">
            <a class="nav-link user-panel d-flex align-items-center" data-toggle="dropdown" href="#">
              <img src="../wp-images/<?= $avatar ?>" class="img-circle" alt="User Image">
              <span class="text-gray"><?= $user_name ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <?php
              if ($role == 'administrator') {
              ?>
                <a class="dropdown-item" href="../wp-admin/">
                  <i class="fas fa-user-shield mr-2"></i>Admin Panel
                </a>
                <div class="dropdown-divider"></div>
              <?php
              }
              ?>
              
              <button class="dropdown-item" data-toggle="modal" data-target="#user-settings">
                <i class="fas fa-cog mr-2"></i>Settings
              </button>
              <div class="dropdown-divider"></div>
              <a href="../wp-includes/logout.php" class="dropdown-item btn-danger">
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

        <button class="navbar-toggler order-1 first-button" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <div class="animated-icon1"><span></span><span></span><span></span></div>
        </button>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"> Research Portal</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h5 class="card-title">Teacher Researcher</h5>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                  </p>
                </div>
                <div class="card-footer">
                  <a href="teachers.php" class="btn btn-primary">Open Folder <i class="fa fa-arrow-right ml-2"></i></a>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card card-outline card-danger">
                <div class="card-header">
                  <h5 class="card-title">Student Researcher</h5>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                  </p>
                </div>
                <div class="card-footer">
                  <a href="students.php" class="btn btn-danger">Open Folder <i class="fa fa-arrow-right ml-2"></i></a>
                </div>
              </div>

            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
    include_once('footer.php');
    ?>

  </div>
  <!-- ./wrapper -->
  <!-- REQUIRED SCRIPTS -->
  <?php
  include_once('scripts.php');
  include_once('user-modal.php');
  ?>
</body>

</html>