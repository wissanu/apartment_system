<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke Vj lib to retrieve data from database
  $Vj_profile = new Vj;
  // create template
  $template = new Template('template/page_vj/vj_profile.php');
  // check method GET
  $Vj_id = isset($_GET["id"]) ? $_GET["id"] : null;
  $Vj_p = isset($_GET["p"]) ? $_GET["p"] : null;
  $Vj_action = isset($_GET["action"]) ? $_GET["action"] : null;

  // check if there is specific query needed to retrieve
  if($Vj_id && $Vj_p)
  {
    // retrieve data after search
    $template->Vj_profiles =  $Vj_profile->getByVj($Vj_p, $Vj_id);
    $template->Vj_Len = count($template->Vj_profiles);
    $template->Vj_title = "ค้นหาด้วย keyword : '".$Vj_id."'";
  } elseif($Vj_id && $Vj_action == 'delete')
  {
    // delete data from id
    $Vj_profile->delIdVj($Vj_id);
    header("location: profile.php");
  }else
  {
    // retrieve all data (initial)
    $template->Vj_profiles =  $Vj_profile->getAllVj();
    $template->Vj_Len = count($template->Vj_profiles);
    $template->Vj_title = "";
  }

  echo $template;
?>
