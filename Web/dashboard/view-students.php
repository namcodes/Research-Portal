<?php
include_once('../wp-includes/session.php');
if(!isset($_SESSION['view_name']) && isset($_SESSION['file_name'])){
    header("Location: ../dashboard");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Researchers | Students</title>

    <?php include_once('headers.php'); ?>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="../assets/icon.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
                    <span class="brand-text font-weight-light">Research Portal</span>
                </a>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="teachers.php" class="nav-link">Teacher</a>
                        </li>
                        <li class="nav-item">
                            <a href="students.php" class="nav-link active">Student</a>
                        </li>
                        <li class="nav-item dropdown user-small d-none">
                            <a class="nav-link user-panel d-flex align-items-center" data-toggle="dropdown" href="#">
                                <img src="../assets/icon.png" class="img-circle" alt="User Image">
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
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item dropdown user-large">
                        <a class="nav-link user-panel d-flex align-items-center" data-toggle="dropdown" href="#">
                            <img src="../assets/icon.png" class="img-circle" alt="User Image">
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
                            <h1 class="m-0"> Research Portal <small class="text-lg"> > Students</small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Students</li>
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
                        <!-- /.col-md-6 -->
                        <div class="col-lg-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <h5 class="card-title"><?= $_SESSION['view_name'] ?></h5>
                                        <a href="../wp-files/<?= $_SESSION['file_name'] ?>" download="<?= $_SESSION['view_name'] ?>" class="btn btn-primary" target="_blank">
                                            Download <i class="fa fa-download"></i>
                                        </a>
                                    </div>

                                </div>
                                <div class="card-body text-center">
                                    <?php
                                    if ($_SESSION['web_status'] == "online" || $_SESSION['web_status'] == "Online") {
                                    ?>
                                        <div class="row">
                                            <div style="width: 100%; height: 100vh; position: relative;">
                                                <iframe style="height: 100vh;" class="w-100" src='http://docs.google.com/gview?url=<?=$_SESSION['web_address']?>/wp-files/<?=$_SESSION['file_name']?>&embedded=true' frameborder="0" scrolling="no" seamless=""></iframe>
                                                <div style="padding: 10px; width: 45px; height:45px; position: absolute; background-color: #fff; border-radius: 5px; right: 9px; top: 9px;">
                                                    <img style="width: 100%;" src="../assets/icon.png" alt="User Image">
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="row d-flex flex-column justify-content-center py-5">
                                            <h1>Offline Mode</h1>
                                            <div>
                                                <div class="badge badge-warning p-2">
                                                    <i class="fa fa-eye"></i> No Preview
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
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