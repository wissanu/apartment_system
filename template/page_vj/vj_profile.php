<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
  <h3> ค้นหาห้องพัก </h3><br>
    <form method="GET" action="profile.php">
      <div class="row">
        <div class="col-md-2">
          <select name="p" class="form-control">
            <option value="1"> Find All </option>
            <option value="user_id"> หมายเลขผู้เช่า </option>
            <option value="name"> ชื่อ </option>
            <option value="Lastname"> นามสกุล </option>
            <option value="phone_number"> เบอร์โทรศัพท์ </option>
            <option value="room_type"> ประเภทห้อง </option>
            <option value="room_number"> เบอร์ห้องพัก </option>
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
    <hr class="dashed">
    <br><h4> สร้างห้องพัก </h4><br>
    <a class=" btn btn-primary" href="add_vj.php">สร้างห้องพัก</a>
</div>
<?php
if($Vj_Len > 0 && $Vj_title != ""){
  echo '<div class="alert alert-success" role="alert">'.$Vj_title.'</div>';
}elseif($Vj_Len == 0 && $Vj_title != "") {
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
        <th scope="col">ประเภทห้อง</th>
        <th scope="col">เบอร์ห้องพัก</th>
        <th scope="col">มิเตอร์ไฟฟ้า - เริ่มต้น</th>
        <th scope="col">มิเตอร์น้ำ - เริ่มต้น</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($Vj_profiles as $VJ): ?>
      <tr>
        <?php echo '<th scope="row">'.$VJ->user_id.'</th>'; ?>
        <?php echo '<td>'.$VJ->name.'</td>'; ?>
        <?php echo '<td>'.$VJ->lastname.'</td>'; ?>
        <?php echo '<td>'.$VJ->phone_number.'</td>'; ?>
        <?php echo '<td>'.$VJ->room_type.'</td>'; ?>
        <?php echo '<td>'.$VJ->room_number.'</td>'; ?>
        <?php echo '<td>'.$VJ->meter_light.'</td>'; ?>
        <?php echo '<td>'.$VJ->meter_water.'</td>'; ?>
        <?php echo '<td><a class=" btn btn-success" href="edit_vj.php?id='.$VJ->user_id.'">Edit</a></td>'; ?>
        <?php echo '<td><a class=" btn btn-danger" href="profile.php?id='.$VJ->user_id.'&action=delete">Delete</a></td>'; ?>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
