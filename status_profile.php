<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke Status lib to retrieve data from database
  $Status_profile = new Status;
  // create template
  $template = new Template('template/page_status/status_profile_setting.php');

  if(isset($_POST['btn_save']))
  {
    // delete data from id
    $Status_profile->editIdStatus($_POST);
    header("location: status_profile.php");
  }
  elseif (isset($_POST['month_status']))
  {
    $month_result = $Status_profile->getByMonth($_POST);
    echo json_encode(array($month_result));
    exit;
  }
  else
  {
    // retrieve all data (initial)
    $template->Status_profiles =  $Status_profile->getAllStatus();
    $template->Status_Len = count($template->Status_profiles);
    $template->Status_title = "";
    $template->Get_month = $Status_profile->getMonth();
  }

  echo $template;
?>
