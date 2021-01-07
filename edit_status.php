<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke Status lib to retrieve data from database
  $Status_profile = new Status;
  // create template
  $template = new Template('template/page_status/status_edit_profile.php');
  // check method GET
  $Status_id = isset($_GET["id"]) ? $_GET["id"] : null;


  // check if there is specific query needed to retrieve
  if($Status_id){
    $template->Status_profiles =  $Status_profile->getRentStatus($Status_id);
  }

  if(isset($_POST['btn_save']))
  {
    $template->Status_profiles = $Status_profile->editRentStatus($_POST);
    header("location: status_profile.php");
  }

  echo $template;
?>
