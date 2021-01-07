<?php

session_start();

if(isset($_SESSION["admin_name"])){
    header("Location: index.php");
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
  <link rel="stylesheet" href="./assets/styles_login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">


</head>
<body class="text-center" style="background: #7c66d8;">
