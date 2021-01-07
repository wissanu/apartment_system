<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
    <h1> แก้ไขใบแจ้งชำระรายเดือน</h1>
</div>
<form method="POST" name="form" action="edit_status.php" enctype="multipart/form-data">
  <input type="hidden" name="id" id="user_id" value="<?php echo $Status_profiles[0]->rent_id;?>" />
  <input type="hidden" name="r_type" id="user_id" value="<?php echo $Status_profiles[0]->room_type;?>" />
  <div class="row">
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="meter_w_p">ค่าน้ำเดือนก่อน</label>
        <input name="meter_w_p" type="text" class="form-control" value="<?php echo $Status_profiles[0]->meter_w_p; ?>">
      </div>
      <div class="form-group">
        <label for="meter_w_c">ค่าน้ำเดือนนี้</label>
        <input name="meter_w_c" type="text" class="form-control" value="<?php echo $Status_profiles[0]->meter_w_c; ?>">
      </div>
    </div>
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="meter_l_p">ค่าไฟเดือนก่อน</label>
        <input name="meter_l_p" type="text" class="form-control" value="<?php echo $Status_profiles[0]->meter_l_p; ?>">
      </div>
      <div class="form-group">
        <label for="meter_l_c">ค่าไฟเดือนนี้</label>
        <input name="meter_l_c" type="text" class="form-control" value="<?php echo $Status_profiles[0]->meter_l_c; ?>">
      </div>
    </div>

    <div class="offset-md-5 col-md-4" style="margin-top:40px;margin-bottom:40px;">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">ยืนยัน</button>
    </div>
  </div>
</form>

<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
