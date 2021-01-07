<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
    <h3> เลือกเดือนที่ต้องการจะทำ ใบชำระค่าห้อง</h3>
</div>
<form method="POST" name="form" action="print_bill.php" enctype="multipart/form-data" target="_blank">
  <div class="row">
    <div class="offset-md-4 col-md-4">
      <div class="form-group">
        <select name="r_month" id="inputState" class="form-control">
          <?php
            foreach ($Bill_profiles as $m)
            {
              echo '<option value="'.$m->month.'">'.$m->month.'</option>';
            }
          ?>
        </select>

      </div>

    </div>

    <div class="offset-md-5 col-md-4" style="margin-top:40px;margin-bottom:40px;">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">ยืนยัน</button>
    </div>
  </div>
</form>


<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
