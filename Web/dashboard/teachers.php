<?php
include_once('../wp-includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Research | Teachers</title>

    <?php include_once('headers.php'); ?>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="../assets/icon.png" alt="AdminLTE Logo" class="brand-image img-circle"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Research Portal</span>
                </a>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                    <li class="nav-item">
                            <a href="teachers.php" class="nav-link active">Teacher</a>
                        </li>
                        <li class="nav-item">
                            <a href="students.php" class="nav-link">Student</a>
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

                <button class="navbar-toggler order-1 first-button" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <h1 class="m-0"> Research Portal <small class="text-lg"> > Teacher</small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Teachers</li>
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
                        <?php
                            $host = "localhost";
                            $db_username = "root";
                            $db_password = "";
                            $sys_database = "cn_r-portal";

                            $conn = new mysqli($host, $db_username, $db_password, $sys_database);

                            $folder_query = $conn->query("SELECT * FROM tbl_category WHERE folder_name = 'Teacher' ORDER BY _id ASC");
                            $file = '';
                            if ($folder_query->num_rows > 0) {
                                foreach ($folder_query as $tbl_r) {
                                    $file_query = $conn->query("SELECT c.category_id as category_id, c.name as category, f.file_name as file_name, c.slog as slog, f.file_description as file_desc FROM tbl_files f LEFT JOIN tbl_category c ON f.category_id = c.category_id WHERE c.folder_name = 'Teacher' AND f.category_id = '{$tbl_r['category_id']}'");

                                    foreach ($file_query as $file_info) {
                                        $file .= '
                                        <a href="view.php?v='.$file_info['file_name'].'&f='.$file_info['file_desc'].'&mode=teacher" data-id="1" class="btn_view d-block mb-2 px-2 col-md-4">
                                            <div class="border p-2 rounded d-flex justify-content-between px-3">
                                                <div>
                                                    <i class="fa fa-folder"></i> -
                                                    '.$file_info['file_name'].'
                                                </div>
                                                <div>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </div>
                                        </a>
                                        ';
                                    }


                                    echo ('
                                    <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h5 class="card-title"> <i class="fas fa-folder"></i> - ' . $tbl_r['name'] . '</h5>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            Some quick example text to build on the card title and make up the bulk of the
                                            cards
                                            content.
                                        </p>
    
                                        <div class="d-flex align-items-center w-100 flex-wrap">
                                        ' .$file. '
                                        </div>
    
                                    </div>
                                </div>');

                                $file = ''; //Set empty;
                                }
                            }


                            ?>
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