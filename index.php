<?php include_once(__DIR__."/config/init.php");?>
<?php
  $Chart_profile = new Chart;
  $template = new Template('template/page_index/dashboard.php');

  $template->chart_profit =  $Chart_profile->getChartProfit();
  $template->chart_nopay =  $Chart_profile->getChartNoPay();
  echo $template;
?>
