<?php include_once(__DIR__."/config/init.php");?>
<?php
  $Bill_profile = new Bill;
  $template = new Template('template/page_bill/bill_profile_setting.php');

  $template->Bill_profiles =  $Bill_profile->getAllmonth();
  
  echo $template;
?>
