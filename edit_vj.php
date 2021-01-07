<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke Vj lib to retrieve data from database
  $Vj_profile = new Vj;
  // create template
  $template = new Template('template/page_vj/edit_vj_profile.php');
  // check method GET
  $Vj_id = isset($_GET["id"]) ? $_GET["id"] : null;


  // check if there is specific query needed to retrieve
  if($Vj_id){
    $template->Vj_profiles =  $Vj_profile->getIdVj($Vj_id);
  }

  if(isset($_POST['btn_save']))
  {
    $template->Vj_profiles = $Vj_profile->editIdVj($_POST);
    header("location: profile.php");
  }

  echo $template;
?>
