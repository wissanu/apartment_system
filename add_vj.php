<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke Vj lib to retrieve data from database
  $Vj_profile = new Vj;
  // create template
  $template = new Template('template/page_vj/add_vj_profile.php');


  if(isset($_POST['btn_save']))
  {
    $template->Vj_profiles = $Vj_profile->addIdVj($_POST);
    header("location: profile.php");
  }

  echo $template;
?>
