<div class="modal fade" id="user-settings" style="display: none" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Settings</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="../wp-includes/user-settings.php" enctype="multipart/form-data" method="post">
        <input type="text" value="<?=$user_id?>" name="token_id" hidden>
          <div class="modal-body">
            <div class="form-group">
              <label for="avatar">Avatar</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="avatar" class="custom-file-input" />
                  <label class="custom-file-label" for="avatar">Choose file</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="user_id">LRN/EMPLOYEE ID</label>
              <input type="text" class="form-control" name="user_id" value="<?=$user_id?>" required />
            </div>
            <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" value="<?=$first_name?>" required />
            </div>
            <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" value="<?=$last_name?>" required />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" />
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            <button name="edit-settings" class="btn btn-primary" type="submit">
              Save
            </button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>