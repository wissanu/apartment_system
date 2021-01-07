<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<form method="POST" name="form" action="status_profile.php" enctype="multipart/form-data">
<div class="jumbotron">
  <h3> การจัดการ - สถานะการชำระค่าห้อง </h3> <h5> (ใบรายการ ย้อนหลัง 6 เดือน นับจากเดือน ปัจจุบัน)</h5>
</div>
</br>
<div class="row">
  <div class="col-md-2 offset-10">
    <div class="form-group">
      <label for="m_type">เลือกเดือน</label>
      <select name="m_type" id="month_state" class="form-control">
        <?php $m_data = array("ธันวาคม","มกราคม","กุมพาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); ?>
        <?php foreach ($Get_month as $m_month): ?>
          <?php echo '<option value="'.$m_month->month.'"> '.$m_data[$m_month->month].' </option>'; ?>
        <?php endforeach; ?>
      </select>

    </div>
  </div>
</div>
</br>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-center">เลือกห้องพัก</th>
          <th scope="col" class="text-center">ประเภทห้องพัก</th>
          <th scope="col" class="text-center">สถานะ</th>
          <th scope="col" class="text-center">มิเตอร์ไฟ - เดือนนี้</th>
          <th scope="col" class="text-center">มิเตอร์น้ำ - เดือนนี้</th>
          <th scope="col" class="text-center">ค่าที่พักรวม - ค่าน้ำ และ ค่าไฟ</th>
          <th scope="col" class="text-center">แก้ไข</th>
        </tr>
      </thead>
      <tbody id="tblParticipantList">
        <?php $count_box = 1; ?>
        <?php foreach ($Status_profiles as $VJ): ?>
        <?php $color_status = ($VJ->payment_status == 0)? 'danger': 'success' ?>
        <?php $c_box = ($VJ->payment_status == 1)? 'disabled':  '' ?>
        <?php $link = ($VJ->payment_status == 1)? 'button':  'a' ?>
        <tr>
          <?php echo '<input type="hidden" name="l_id[]" id="user_id" value="'.$VJ->lease_id.'"/>'; ?>
          <?php echo '<input type="hidden" name="r_id[]" id="user_id" value="'.$VJ->rent_id.'"/>'; ?>
          <?php echo '<th scope="row" class="text-center"><div class="custom-control custom-checkbox">
                  <input type="checkbox" '.$c_box.' name="check['.$VJ->rent_id.']" class="custom-control-input" id="customCheck'.$count_box.'">
                  <label class="custom-control-label" for="customCheck'.$count_box.'">'.$VJ->room_number.'</label>
              </div></th>'; ?>
          <?php echo '<td class="text-center">'.$VJ->room_type.'</td>'; ?>
          <?php $status = ($VJ->payment_status == 0)? 'ค้างชำระ': 'ชำระเสร็จสิ้น' ?>
          <?php echo '<td class="btn-'.$color_status.' text-center">'.$status.'</td>'; ?>
          <?php echo '<td class="text-center">'.$VJ->meter_l_p.'</td>'; ?>
          <?php echo '<td class="text-center">'.$VJ->meter_w_p.'</td>'; ?>
          <?php echo '<td class="text-center">'.$VJ->payment_amount.'</td>'; ?>
          <?php echo '<td><'.$link.' class=" btn btn-success" href="edit_status.php?id='.$VJ->rent_id.'" '.$c_box.'>แก้ไข</'.$link.'></td>'; ?>
        </tr>
        <?php $count_box += 1; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="offset-md-5 col-md-4" style="margin-top:40px;margin-bottom:40px;">
      <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">ยืนยัน</button>
  </div>
</form>
<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
