<?php include_once(__DIR__."/config/init.php");?>
<?php
  $Admin = new Admin;
  $template = new Template('template/login.php');

  if(isset($_SESSION['admin_name']))
  {
    header("location: index.php");
  }
  else {
    if(isset($_POST['btn-submit']) && !empty($_POST['email']) && !empty($_POST['password'])){
      $result_admin = $Admin->getUserAdmin($_POST['email'], $_POST['password']);
      if(count($result_admin) > 0)
      {
        session_start();
        $_SESSION['admin_name'] = $result_admin[0]->admin_name;
        header("location: index.php");
      }
      else
      {
        header("location: login_p.php");
      }
    }
  }
  echo $template;
?>
