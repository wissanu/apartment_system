<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
    <h1> แก้ไขค่าข้อมูลพื้นฐาน</h1>
</div>
<form method="POST" name="form" action="edit_coin.php" enctype="multipart/form-data">
  <div class="row">
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="unit_water">ยูนิตค่าน้ำ</label>
        <input name="unit_water" type="text" class="form-control" value="<?php echo $Coin_profiles[0]->unit_water; ?>">
      </div>
      <div class="form-group">
        <label for="unit_light">ยูนิตไฟฟ้า</label>
        <input name="unit_light" type="text" class="form-control" value="<?php echo $Coin_profiles[0]->unit_light; ?>">
      </div>

    </div>
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="fee_fan">ราคาห้องพัดลม</label>
        <input name="fee_fan" type="text" class="form-control" value="<?php echo $Coin_profiles[0]->fee_fan; ?>">
      </div>
      <div class="form-group">
        <label for="fee_air">ราคาห้องปรับอากาศ</label>
        <input name="fee_air" type="text" class="form-control" value="<?php echo $Coin_profiles[0]->fee_air; ?>">
      </div>
    </div>

    <div class="offset-md-5 col-md-4" style="margin-top:40px;margin-bottom:40px;">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">ยืนยัน</button>
    </div>
  </div>
</form>

<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
