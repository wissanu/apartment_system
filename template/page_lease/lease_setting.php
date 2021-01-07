<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
    <h1> ค้นหาสัญญาเช่า </h1>
    <br>
    <form method="GET" action="lease_profile.php">
      <div class="row">
        <div class="col-md-2">
          <select name="p" class="form-control">
            <option value="1"> Find All </option>
            <option value="name"> ชื่อ </option>
            <option value="lastname"> นามสกุล </option>
            <option value="phone_number"> เบอร์โทรศัพท์ </option>
            <option value="lease_id"> เลขสัญญา </option>
          </select>
        </div>
        <div class="col-md-6 col-lg-5">
          <div class="input-group mb-3">
            <input type="text" name="id" class="form-control" placeholder="Search">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit">ค้นหา</button>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>
<?php
if($News_Len > 0 && $News_title != ""){
  echo '<div class="alert alert-success" role="alert">'.$News_title.'</div>';
}elseif($News_Len == 0 && $News_title != "") {
  echo '<div class="alert alert-danger" role="alert"> keyword นี้ไม่มีในฐานข้อมูล</div>';
}
?>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">หมายเลขผู้เช่า</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">นามสกุล</th>
        <th scope="col">เบอร์โทรศัพท์</th>
        <th scope="col">วันเริ่มต้น</th>
        <th scope="col">วันสิ้นสุด</th>
        <th scope="col">ค่ามัดจำ</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($News_profiles as $NEws): ?>
      <tr>
        <?php echo '<th scope="row">'.$NEws->user_id.'</th>'; ?>
        <?php echo '<td>'.$NEws->name.'</td>'; ?>
        <?php echo '<td>'.$NEws->lastname.'</td>'; ?>
        <?php echo '<td>'.$NEws->phone_number.'</td>'; ?>
        <?php echo '<td>'.$NEws->start_date.'</td>'; ?>
        <?php echo '<td>'.$NEws->end_date.'</td>'; ?>
        <?php echo '<td>'.$NEws->deposit.'</td>'; ?>
        <?php echo '<td><a class=" btn btn-success" href="edit_lease.php?id='.$NEws->user_id.'">Edit</a></td>'; ?>
        <?php echo '<td><a class=" btn btn-danger" href="lease_profile.php?id='.$NEws->user_id.'&action=delete">Delete</a></td>'; ?>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
