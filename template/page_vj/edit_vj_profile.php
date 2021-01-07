<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
    <h1> แก้ไขข้อมูลห้องพัก : เบอร์ห้องพัก <?php echo $Vj_profiles[0]->room_number; ?></h1>
</div>
<form method="POST" name="form" action="edit_vj.php" enctype="multipart/form-data">
  <input type="hidden" name="id" id="user_id" value="<?php echo $Vj_profiles[0]->user_id;?>" />
  <div class="row">
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="firstname">ชื่อ</label>
        <input name="firstname" type="text" class="form-control" value="<?php echo $Vj_profiles[0]->name; ?>">
      </div>
      <div class="form-group">
        <label for="lastname">นามสกุล</label>
        <input name="lastname" type="text" class="form-control" value="<?php echo $Vj_profiles[0]->lastname; ?>">
      </div>
      <div class="form-group">
        <label for="email">เบอร์โทรศัพท์</label>
        <input name="phone_number" type="text" class="form-control" value="<?php echo $Vj_profiles[0]->phone_number; ?>">
      </div>
    </div>
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="r_type">ประเภทห้อง</label>
        <select name="r_type" id="inputState" class="form-control">
          <?php $fan_type = ($Vj_profiles[0]->room_type == "พัดลม")? 'selected': ''; ?>
          <?php $air_type = ($Vj_profiles[0]->room_type == "ห้องปรับอากาศ")? 'selected': ''; ?>
          <option value="พัดลม" <?php echo $fan_type; ?>>พัดลม</option>
          <option value="ห้องปรับอากาศ" <?php echo $air_type; ?>>ห้องปรับอากาศ</option>
        </select>

      </div>
      <div class="form-group">
        <label for="r_number">เบอร์ห้องพัก</label>
        <input name="r_number" type="text" class="form-control" value="<?php echo $Vj_profiles[0]->room_number; ?>">
      </div>
      <div class="form-group">
        <label for="r_meter_water">มิเตอร์ค่าน้ำ ของห้องพักล่าสุด</label>
        <input name="r_meter_water" type="text" class="form-control" value="<?php echo $Vj_profiles[0]->meter_water; ?>">
      </div>
      <div class="form-group">
        <label for="r_meter_light">มิเตอร์ค่าไฟ ของห้องพักล่าสุด</label>
        <input name="r_meter_light" type="text" class="form-control" value="<?php echo $Vj_profiles[0]->meter_light; ?>">
      </div>
    </div>

    <div class="offset-md-5 col-md-4" style="margin-top:40px;margin-bottom:40px;">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">ยืนยัน</button>
    </div>
  </div>
</form>

<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
