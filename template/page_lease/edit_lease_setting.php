<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
    <h1> แก้ไขสัญญาเช่า : คุณ <?php echo $News_profiles[0]->name; ?></h1>
</div>
<form method="POST" name="form" action="edit_lease.php" enctype="multipart/form-data">
  <input type="hidden" name="id" id="user_id" value="<?php echo $News_profiles[0]->user_id;?>" />
  <div class="row">
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="s_date">วันเริ่มต้น</label>
        <input name="s_date" type="input" class="form-control" id="datepicker_start" value="<?php echo $News_profiles[0]->start_date; ?>">
      </div>
      <div class="form-group">
        <label for="e_date">วันสิ้นสุด</label>
        <input name="e_date" type="input" class="form-control" id="datepicker_end" value="<?php echo $News_profiles[0]->end_date; ?>">
      </div>
    </div>
    <div class="offset-md-1 col-md-4">
      <div class="form-group">
        <label for="deposit">ค่ามัดจำ</label>
        <input name="deposit" type="text" class="form-control" value="<?php echo $News_profiles[0]->deposit; ?>">
      </div>
    </div>

    <div class="offset-md-5 col-md-4" style="margin-top:40px;margin-bottom:40px;">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">ยืนยัน</button>
    </div>
  </div>
</form>

<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
