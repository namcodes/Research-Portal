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
              <a href="category.php" class="nav-link active bg-gradient-primary">
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
              <h1 class="m-0">Category</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
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
                  <button class="btn btn-primary" data-toggle="modal" data-target="#create-category">
                    <i class="fa fa-plus-circle mr-1"></i> - New Category
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Total</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $category = $conn->query("SELECT * FROM tbl_category");
                      $counter = 0;
                      foreach ($category as $tbl_row) {
                        ++$counter;

                        $total = $conn->query("SELECT COUNT(*) as total from tbl_files WHERE category_id = '" . $tbl_row['category_id'] . "';");
                        $category_total = $total->fetch_assoc();
                        echo ('
                          <tr>
                            <td style="white-space: nowrap">' . $counter . '</td>
                            <td style="white-space: nowrap">
                            <b>' . $tbl_row['folder_name'] . '</b> - ' . $tbl_row['name'] . '
                            </td>
                            <td style="white-space: nowrap">
                            ' . $tbl_row['description'] . '
                            </td>
                            <td style="white-space: nowrap">
                              ' .  $category_total['total'] . '
                              </td>
                            <td class="text-left" style="white-space: nowrap">
                              <button
                                data-id="' . $tbl_row['category_id'] . '"
                                class="btn btn-success mr-2 btn-edit"
                              >
                                <i class="fas fa-edit"></i> Edit
                              </button>
                              <button
                                data-id="' . $tbl_row['category_id'] . '"
                                class="btn-delete btn btn-danger"
                              >
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

  <div class="modal fade" id="create-category" style="display: none" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="../wp-includes/category.php" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="cat_name">Main Category</label>
              <select name="cat_name" class="form-control" required>
                <option value="">Select Main Category...</option>
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" required />
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" required />
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            <button name="create-category" class="btn btn-primary" id="button-submit" type="submit">
              Save
            </button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="edit-category" style="display: none" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="../wp-includes/category.php" method="post">
          <div class="modal-body">
            <input type="text" class="category_id" name="category_id" hidden>
            <div class="form-group">
              <label for="cat_name">Main Category</label>
              <select name="cat_name" class="form-control">
                <option value="">Select Main Category...</option>
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control name" name="name" required />
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control description" name="description" required />
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            <button name="edit-category" class="btn btn-primary" id="button-submit" type="submit">
              Save
            </button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

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

    $(document).on("click", ".btn-edit", function() {
      let category_id = $(this).data("id");
      let category_Token = "_token-req89172310231";
      $.ajax({
        url: "../wp-includes/category.php",
        method: "POST",
        data: {
          category_Token: category_Token,
          category_id: category_id
        },
        dataType: 'json',
        success: function(data) {
          $(".category_id").val(data.category_id);
          $(".name").val(data.name);
          $(".description").val(data.description);
          $("#edit-category").modal("show");
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
            window.location.href = "../wp-includes/delete.php?delete_category=" + id;
          }, 1500);
        }
      });
    });
  </script>
</body>

</html>