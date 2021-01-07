<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke Coin lib to retrieve data from database
  $Coin_profile = new Coin;
  // create template
  $template = new Template('template/page_coin/edit_coin_profile.php');

  if(isset($_POST['btn_save']))
  {
    $template->Coin_profiles = $Coin_profile->editCoinConstant($_POST);
    header("location: coin_profile.php");
  }
  else
  {
    $template->Coin_profiles = $Coin_profile->getAllConstant();
    $template->Coin_Len = count($template->Coin_profiles);
    $template->Coin_title = "";
  }

  echo $template;
?>
