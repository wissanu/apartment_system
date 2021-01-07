<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke Admin lib to retrieve data from database
  $Admin_profile = new Admin;
  // create template
  $template = new Template('template/page_admin/admin_setting.php');
  // check method GET
  $Admin_id = isset($_GET["id"]) ? $_GET["id"] : null;
  $Admin_p = isset($_GET["p"]) ? $_GET["p"] : null;
  $Admin_action = isset($_GET["action"]) ? $_GET["action"] : null;

  // check if there is specific query needed to retrieve
  if($Admin_id && $Admin_p)
  {
    // retrieve data after search
    $template->Admin_profiles =  $Admin_profile->getByAdmin($Admin_p, $Admin_id);
    $template->Admin_Len = count($template->Admin_profiles);
    $template->Admin_title = "ค้นหาด้วย keyword : '".$Admin_id."'";
  } elseif($Admin_id && $Admin_action == 'delete')
  {
    // delete data from id
    $Admin_profile->delIdAdmin($Admin_id);
    header("location: admin_profile.php");
  }else
  {
    // retrieve all data (initial)
    $template->Admin_profiles =  $Admin_profile->getAllAdmin();
    $template->Admin_Len = count($template->Admin_profiles);
    $template->Admin_title = "";
  }

  echo $template;
?>
