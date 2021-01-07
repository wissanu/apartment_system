<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke News lib to retrieve data from database
  $News_profile = new News;
  // create template
  $template = new Template('template/page_lease/lease_setting.php');
  // check method GET
  $News_id = isset($_GET["id"]) ? $_GET["id"] : null;
  $News_p = isset($_GET["p"]) ? $_GET["p"] : null;
  $News_action = isset($_GET["action"]) ? $_GET["action"] : null;

  // check if there is specific query needed to retrieve
  if($News_id && $News_p)
  {
    // retrieve data after search
    $template->News_profiles =  $News_profile->getByNews($News_p, $News_id);
    $template->News_Len = count($template->News_profiles);
    $template->News_title = "ค้นหาด้วย keyword : '".$News_id."'";
  } elseif($News_id && $News_action == 'delete')
  {
    // delete data from id
    $News_profile->delIdNews($News_id);
    header("location: lease_profile.php");
  }else
  {
    // retrieve all data (initial)
    $template->News_profiles =  $News_profile->getAllNews();
    $template->News_Len = count($template->News_profiles);
    $template->News_title = "";
  }

  echo $template;
?>
