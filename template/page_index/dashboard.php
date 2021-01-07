<?php include dirname(__DIR__,1).'/inc/header.php'; ?>
<br>
<div class="jumbotron">
  <h3 class="text-center"> กราฟแสดงผล </h3>
</div>

<div id="chartprofit" style="height: 300px; width: 100%;"></div>
<br>
<div id="chartnopay" style="height: 300px; width: 100%;"></div>
<script>
    window.onload = function () {

        var chart= new CanvasJS.Chart("chartprofit", {
      	animationEnabled: true,
      	exportEnabled: true,
      	theme: "light1", // "light1", "light2", "dark1", "dark2"
      	title:{
      		text: "รายได้ ย้อนหลัง 6 เดือน (ที่จ่ายแล้ว)"
      	},
      	data: [{
      		type: "column", //change type to bar, line, area, pie, etc
      		dataPoints: <?php echo json_encode($chart_profit, JSON_NUMERIC_CHECK); ?>
      	}]
      });
      chart.render();

      var chart2 = new CanvasJS.Chart("chartnopay", {
      animationEnabled: true,
      exportEnabled: true,
      theme: "light1", // "light1", "light2", "dark1", "dark2"
      title:{
        text: "ห้องที่ค้างการชำระ (จำนวนครั้ง)"
      },
      data: [{
        type: "column", //change type to bar, line, area, pie, etc
        dataPoints: <?php echo json_encode($chart_nopay, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart2.render();
    }

</script>

<?php include dirname(__DIR__,1).'/inc/footer.php'; ?>
