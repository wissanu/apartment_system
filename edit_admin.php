<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke Admin lib to retrieve data from database
  $Admin_profile = new Admin;
  // create template
  $template = new Template('template/page_admin/edit_admin_setting.php');
  // check method GET
  $Admin_id = isset($_GET["id"]) ? $_GET["id"] : null;


  // check if there is specific query needed to retrieve
  if($Admin_id){
    $template->Admin_profiles =  $Admin_profile->getIdAdmin($Admin_id);
  }

  if(isset($_POST['btn_save']))
  {
    $template->Admin_profiles = $Admin_profile->editIdAdmin($_POST);
    header("location: admin_profile.php");
  }

  echo $template;
?>
