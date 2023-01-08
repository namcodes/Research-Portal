<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Research Portal | Files</title>
  <?php include_once('headers.php');?>
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
        <li class="nav-item dropdown">
          <a class="nav-link user-panel d-flex align-items-center" data-toggle="dropdown" href="#">
            <img src="../assets/icon.png" class="img-circle mr-2" alt="User Image" />
            <span class="text-gray"><?= $user_name ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <a href="#" data-toggle="modal" data-target="#user-settings" class="dropdown-item">
              <i class="fas fa-cog mr-2"></i>Settings
            </a>
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
              <a href="../wp-admin/" class="nav-link">
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
              <a href="files.php" class="nav-link active bg-gradient-primary">
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
              <h1 class="m-0">Files</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Files</li>
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
          <!-- Main row -->
          <div class="row">
            <!-- /.Left col -->
            <section class="col-lg-10">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#upload-file">
                    <i class="fa fa-upload mr-1"></i> - Upload File
                  </button>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body table-responsive">
                  <table id="table" class="table table-bordered table-striped text-center">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>File</th>
                        <th>File Name</th>
                        <th>Category</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $tbl_files = $conn->query("SELECT f._id as id, c.name as category_name, f.file_description as description, f.file_name as name FROM tbl_files f LEFT JOIN tbl_category c ON f.category_id = c.category_id;");
                      $counter = 0;
                      foreach($tbl_files as $tbl_row){
                        ++$counter;
                        echo('
                        <tr>
                          <td style="white-space: nowrap">'. $counter .'</td>
                          <td style="white-space: nowrap">
                            <a href="wp-files/'.$tbl_row['description'].'" class="mr-2">
                              <i class="fa fa-eye text-lg text-gray"></i>
                            </a>

                            <a href="wp-files/'.$tbl_row['description'].'" class="p-2 border img-circle" download="'.$tbl_row['name'].'">
                              <i class="fa fa-download text-lg text-gray"></i>
                            </a>
                          </td>
                          <td style="white-space: nowrap">
                          '.$tbl_row['name'].'
                          </td>
                          <td style="white-space: nowrap">
                          '.$tbl_row['category_name'].'
                          </td>
                          <td class="text-left" style="white-space: nowrap">
                            <button data-id="' . $tbl_row['id'] . '" class="btn btn-success mr-2 btn-edit">
                              <i class="fas fa-edit"></i> Edit
                            </button>
                            <button data-id="' . $tbl_row['id'] . '" class="btn-delete btn btn-danger">
                              <i class="fas fa-trash"></i> Delete
                            </button>
                          </td>
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

  <div class="modal fade" id="upload-file" style="display: none" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload new file</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="../wp-includes/files.php" enctype="multipart/form-data" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="file">File</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" required/>
                  <label class="custom-file-label" for="file">Select File to upload</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter file name" required />
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select name="category" class="form-control" required>
                <option value="">Select Category...</option>
                <?php
                 $category = $conn->query("SELECT * FROM tbl_category");
                 foreach($category as $tbl_category){
                  echo('<option value="'.$tbl_category['category_id'].'">'.$tbl_category['folder_name'].' - '.$tbl_category['name'].'</option>');
                 } 
                ?>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            <button name="upload-file" class="btn btn-primary" id="button-submit" type="submit">
              Save
            </button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="edit-file" style="display: none" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit File</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="../wp-includes/files.php" enctype="multipart/form-data" method="post">
          <div class="modal-body">
            <input type="text" name="file_id" class="file_id" hidden>
            <div class="form-group">
              <label for="file">File</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" />
                  <label class="custom-file-label" for="file">Select File to upload</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control name" name="name" placeholder="Enter file name" required />
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select name="category" class="form-control">
                <option value="">Select Category...</option>
                <?php
                 $category = $conn->query("SELECT * FROM tbl_category");
                 foreach($category as $tbl_category){
                  echo('<option value="'.$tbl_category['category_id'].'">'.$tbl_category['name'].'</option>');
                 } 
                ?>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            <button name="edit-file" class="btn btn-primary" type="submit">
              Save
            </button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- ./wrapper -->

  <?php
  include_once("../wp-includes/response.php");
  include_once("scripts.php");
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

    //Pending function
    $(document).on("click", ".btn-edit", function() {
      let file_id = $(this).data("id");
      let file_Token = "_token-req89172310231";
      $.ajax({
        url: "../wp-includes/files.php",
        method: "POST",
        data: {
          file_Token: file_Token,
          file_id: file_id
        },
        dataType: 'json',
        success: function(data) {
          console.log(data);
            $(".file_id").val(data._id);
            $(".name").val(data.file_name);
            $("#edit-file").modal("show");
        }
      })
    });

    $(document).on('click', '.btn-delete', function(e) {
      e.preventDefault();
      let id = $(this).data("id");
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: 'Success!',
            text: "Successfully Deleted!",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
          })
          setTimeout(function() {
            window.location.href = "../wp-includes/delete.php?delete_file=" + id;
          }, 1500);
        }
      });
    });
  </script>
</body>

</html>