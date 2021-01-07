<?php include_once(__DIR__."/config/init.php");?>
<?php
  // invoke Coin lib to retrieve data from database
  $Coin_profile = new Coin;
  // create template
  $template = new Template('template/page_coin/coin_profile_setting.php');

  if(isset($_POST['btn_save']))
  {
    // delete data from id
    $Coin_profile->editIdCoin($_POST);
    header("location: status_profile.php");
  }else
  {
    // retrieve all data (initial)
    $template->Coin_profiles =  $Coin_profile->getAllCoin();
    $template->Coin_constants = $Coin_profile->getAllConstant();
    $template->Coin_Len = count($template->Coin_profiles);
    $template->Coin_title = "";
  }

  echo $template;
?>
