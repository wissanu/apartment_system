<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
    <h1> Edit Admin : <?php echo $Admin_profiles[0]->admin_name; ?></h1>
</div>
<form method="POST" name="form" action="edit_admin.php" enctype="multipart/form-data">
  <input type="hidden" name="admin_id" id="user_id" value="<?php echo $Admin_profiles[0]->admin_id;?>" />
  <div class="row">
    <div class="offset-md-4 col-md-4 offset-sm-2 col-sm-8">
      <div class="form-group">
        <label for="name">Name</label>
        <input name="admin_name" type="text" class="form-control" value="<?php echo $Admin_profiles[0]->admin_name; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input name="admin_email" type="text" class="form-control" value="<?php echo $Admin_profiles[0]->admin_email; ?>">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input name="admin_password" type="text" class="form-control" value="<?php echo $Admin_profiles[0]->admin_password; ?>">
      </div>
    </div>
    <div class="offset-md-5 col-md-4 offset-sm-5 col-sm-6" style="margin-top:40px;margin-bottom:40px;">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">Submit</button>
    </div>
  </div>
</form>

<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
