<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<form method="POST" name="form" action="coin_profile.php" enctype="multipart/form-data">
<div class="jumbotron">
  <div class="row">
    <div class="col-auto mr-auto">
      <h3> คำนวนค่าน้ำ - ค่าไฟ </h3>
    </div>
    <div class="col-auto">
      <a class=" btn btn-primary" href="edit_coin.php">ตั้งค่า</a>
    </div>
  </div>
  </br>
  <h5> ยูนิต - ค่าน้ำ </h5>  <input name="water_unit" type="text" class="form-control" value="<?php echo $Coin_constants[0]->unit_water?>" readonly>
  </br>
  <h5> ยูนิต - ค่าไฟฟ้า </h5>  <input name="light_unit" type="text" class="form-control" value="<?php echo $Coin_constants[0]->unit_light?>" readonly>
  </br>
  <h5> รอบบิลประจำเดือน </h5>
  <div class="form-group">
    <select name="r_month" id="inputState" class="form-control">
      <?php
        $desribe_m = array("ธันวาคม","มกราคม","กุมพาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $date = explode("/", date("Y/m/d"));
        $month_m = (int)$date[1];
        $month_previous = ($month_m-1);
        $month_current = $month_m;

        echo '<option value="'.$month_current.'">'.$desribe_m[$month_m].'</option>';
        echo '<option value="'.$month_previous.'">'.$desribe_m[$month_m-1].'</option>';
      ?>
    </select>

  </div>
</div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">หมายเลขห้องพัก</th>
          <th scope="col">ประเภทห้องพัก</th>
          <th scope="col">ค่าห้อง</th>
          <th scope="col">มิเตอร์น้ำ - ก่อนหน้า</th>
          <th scope="col">มิเตอร์น้ำ - ล่าสุด</th>
          <th scope="col">มิเตอร์ไฟ - ก่อนหน้า</th>
          <th scope="col">มิเตอร์ไฟ - ล่าสุด</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($Coin_profiles as $VJ): ?>
        <tr>
          <?php $fee = ($VJ->room_type == 'พัดลม')? $Coin_constants[0]->fee_fan : $Coin_constants[0]->fee_air;  ?>
          <?php echo '<input type="hidden" name="lease_id[]" id="user_id" value="'.$VJ->lease_id.'"/>'; ?>
          <?php echo '<input type="hidden" name="user_id[]" id="user_id2" value="'.$VJ->user_id.'"/>'; ?>
          <?php echo '<th scope="row"> <input name="r_number[]" type="text" class="form-control" value="'.$VJ->room_number.'" readonly></th>'; ?>
          <?php echo '<td>'.$VJ->room_type.'</td>'; ?>
          <?php echo '<td> <input name="rent_fee[]" type="text" class="form-control" value="'.$fee.'" readonly></td>'; ?>
          <?php echo '<td> <input name="water_fee_previous[]" type="text" class="form-control" value="'.$VJ->meter_water.'" readonly></td>'; ?>
          <?php echo '<td> <input name="water_fee[]" type="text" class="form-control" value=""> </td>'; ?>
          <?php echo '<td> <input name="light_fee_previous[]" type="text" class="form-control" value="'.$VJ->meter_light.'" readonly></td>'; ?>
          <?php echo '<td> <input name="light_fee[]" type="text" class="form-control" value=""> </td>'; ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="offset-md-5 col-md-4" style="margin-top:40px;margin-bottom:40px;">
      <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">ยืนยัน</button>
  </div>
</form>
<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
