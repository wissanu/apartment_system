<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke News lib to retrieve data from database
  $News_profile = new News;
  // create template
  $template = new Template('template/page_lease/edit_lease_setting.php');
  // check method GET
  $News_id = isset($_GET["id"]) ? $_GET["id"] : null;


  // check if there is specific query needed to retrieve
  if($News_id){
    $template->News_profiles =  $News_profile->getIdNews($News_id);
  }

  if(isset($_POST['btn_save']))
  {
    $template->News_profiles = $News_profile->editIdNews($_POST);
    header("location: lease_profile.php");
  }

  echo $template;
?>
