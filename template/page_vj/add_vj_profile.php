<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
    <h1> เพิ่มห้องพัก </h1>
</div>
<form method="POST" name="form" action="add_vj.php" enctype="multipart/form-data">
  <div class="row">
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="s_tall">จำนวนชั้น</label>
        <input name="s_tall" type="text" class="form-control" value="">
      </div>
      <div class="form-group">
        <label for="s_count">จำนวนห้องต่อชั้น</label>
        <input name="s_count" type="text" class="form-control" value="">
      </div>
    </div>
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="unit_water">ยูนิตค่าน้ำ</label>
        <input name="unit_water" type="text" class="form-control" value="">
      </div>
      <div class="form-group">
        <label for="unit_light">ยูนิตค่าไฟ</label>
        <input name="unit_light" type="text" class="form-control" value="">
      </div>
      <!--<div class="form-group">
        <label for="due_date">กำหนดวันครบรอบการชำระรายเดือน</label>
        <input name="due_date" type="input" id=datepicker_start class="form-control" value="">
      </div>-->
      <div class="form-group">
        <label for="fee_fan">ค่าห้องพัดลม - พื้นฐาน</label>
        <input name="fee_fan" type="text" class="form-control" value="">
      </div>
      <div class="form-group">
        <label for="fee_air">ค่าห้องเครื่องปรับอากาศ - พื้นฐาน</label>
        <input name="fee_air" type="text" class="form-control" value="">
      </div>
    </div>

    <div class="offset-md-5 col-md-4" style="margin-top:40px;margin-bottom:40px;">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">ยืนยัน</button>
    </div>
  </div>
</form>

<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
