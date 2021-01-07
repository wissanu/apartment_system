<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
    <h1> Find Admin </h1>
    <br>
    <form method="GET" action="admin_profile.php">
      <div class="row">
        <div class="col-md-2">
          <select name="p" class="form-control">
            <option value="1"> Find All </option>
            <option value="admin_id"> id </option>
            <option value="admin_name"> name </option>
            <option value="admin_email"> email </option>
            <option value="admin_password"> password </option>
          </select>
        </div>
        <div class="col-md-6 col-lg-5">
          <div class="input-group mb-3">
            <input type="text" name="id" class="form-control" placeholder="Search">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit">Find Admin</button>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>
<?php
if($Admin_Len > 0 && $Admin_title != ""){
  echo '<div class="alert alert-success" role="alert">'.$Admin_title.'</div>';
}elseif($Admin_Len == 0 && $Admin_title != "") {
  echo '<div class="alert alert-danger" role="alert"> keyword นี้ไม่มีในฐานข้อมูล</div>';
}
?>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Edit</th>
        <th scope="col">Del</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($Admin_profiles as $ADmin): ?>
      <tr>
        <?php echo '<th scope="row">'.$ADmin->admin_id.'</th>'; ?>
        <?php echo '<td>'.$ADmin->admin_name.'</td>'; ?>
        <?php echo '<td>'.$ADmin->admin_email.'</td>'; ?>
        <?php echo '<td>'.$ADmin->admin_password.'</td>'; ?>
        <?php echo '<td><a class=" btn btn-success" href="edit_admin.php?id='.$ADmin->admin_id.'">Edit</a></td>'; ?>
        <?php echo '<td><a class=" btn btn-danger" href="admin_profile.php?id='.$ADmin->admin_id.'&action=delete">Delete</a></td>'; ?>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
