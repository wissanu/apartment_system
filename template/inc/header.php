<?php
  session_start();

  if(!isset($_SESSION["admin_name"])){
      header("Location: login_p.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BD_VJ001</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="./assets/styles.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body id="body-pd">
    <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="assets/img/vjlogin01.svg" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
              </li>
            </ul>
          <!--<div class="header__img">
              <img src="assets/img/vjlogin01.svg" alt="">
          </div>-->
      </header>

      <div class="l-navbar" id="nav-bar">
          <nav class="nav">
              <div>
                  <a href="index.php" class="nav__logo">
                      <i class='bx bx-layer nav__logo-icon'></i>
                      <span class="nav__logo-name">Admin-<?php echo $_SESSION['admin_name']; ?></span>
                  </a>
                  <?php
                    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";// your example url
                    $data = parse_url($url); // parse_url() to get path data
                    //echo "<pre/>";print_r($data); // print parse_url() data
                    $new_data = explode('/',$data['path']); // explode the path data only from parse_url() data
                    $last_param = trim($new_data[count($new_data)-1],'/'); // remove `/` from the data and assign to a variable
                    //echo $last_param; // print variable value
                  ?>
                  <div class="nav__list">
                      <?php $active = ($last_param == 'index.php')? 'active':'';
                       echo '<a href="index.php" class="nav__link '.$active.'">';
                       ?>

                      <i class='bx bx-grid-alt nav__icon' ></i>
                          <span class="nav__name">กราฟแสดงผล</span>
                      </a>

                      <?php $active = ($last_param == 'profile.php')? 'active':'';
                       echo '<a href="profile.php" class="nav__link '.$active.'">';
                       ?>
                          <i class='bx bx-buildings nav__icon' ></i>
                          <span class="nav__name">จัดการห้องพัก</span>
                      </a>

                      <?php $active = ($last_param == 'lease_profile.php')? 'active':'';
                       echo '<a href="lease_profile.php" class="nav__link '.$active.'">';
                       ?>
                          <i class='bx bx-news nav__icon' ></i>
                          <span class="nav__name">จัดการสัญญาเช่า</span>
                      </a>

                      <?php $active = ($last_param == 'coin_profile.php')? 'active':'';
                       echo '<a href="coin_profile.php" class="nav__link '.$active.'">';
                       ?>
                          <i class='bx bx-coin nav__icon' ></i>
                          <span class="nav__name">คำนวนราคาห้องพัก</span>
                      </a>

                      <?php $active = ($last_param == 'status_profile.php')? 'active':'';
                       echo '<a href="status_profile.php" class="nav__link '.$active.'">';
                       ?>
                          <i class='bx bx-user nav__icon' ></i>
                          <span class="nav__name">สถานะการจ่าย</span>
                      </a>

                      <?php $active = ($last_param == 'bill_profile.php')? 'active':'';
                      echo '<a href="bill_profile.php" class="nav__link '.$active.'">'
                      ?>
                          <i class='bx bx-clipboard nav__icon' ></i>
                          <span class="nav__name">ออกใบแจ้งชำระ</span>
                      </a>

                      <?php $active = ($last_param == 'admin_profile.php')? 'active':'';
                       echo '<a href="admin_profile.php" class="nav__link '.$active.'">';
                       ?>
                          <i class='bx bx-data nav__icon' ></i>
                          <span class="nav__name">Admin Setting</span>
                      </a>
                  </div>
              </div>

              <a href="logout.php" class="nav__link">
                  <i class='bx bx-log-out nav__icon' ></i>
                  <span class="nav__name">ออกจากระบบ</span>
              </a>
          </nav>
      </div>

      <div class="container-fluid">
        <h1> Bootstrap </h1>
