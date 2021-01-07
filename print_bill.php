<?php require __DIR__. '/vendor/autoload.php'; ?>
<?php include_once(__DIR__."/config/init.php");?>
<?php include_once(__DIR__. "/lib/bill.php"); ?>
<?php include_once(__DIR__. "/lib/Database.php"); ?>
<?php
  $Bill_profile = new Bill;

  if(isset($_POST['btn_save']))
  {
    $bill_structure = $Bill_profile->getAlldata($_POST);
    $constant_data = $Bill_profile->getConstantdata();
    //print_r($bill_structure);
    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];

    // Create an instance of the class:
    $mpdf = new \Mpdf\Mpdf([
        'tempDir' => __DIR__. '/tmp',
        'fontDir' => array_merge($fontDirs, [
            __DIR__. '/tmps',
        ]),
        'fontdata' => $fontData + [
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNew Italic.ttf',
                'B' => 'THSarabunNew Bold.ttf',
                'BI' => 'THSarabunNew BoldItalic.ttf',
                'useOTL' => 0x00,
                'useKashida' => 75,
            ]
        ],
        'default_font' => 'sarabun'
    ]);
    $html = '';
    $style = '<style> table {
	border: 7mm solid aqua;
	border-collapse: collapse;
}
table.table2 {
	border: 2mm solid aqua;
	border-collapse: collapse;
}
table.layout {
	border: 0mm solid black;
	border-collapse: collapse;
}
td.layout {
	text-align: center;
	border: 0mm solid black;
}
td {
	padding: 3mm;
	border: 2mm solid blue;
	vertical-align: middle;
}
td.redcell {
	border: 3mm solid red;
}
td.redcell2 {
	border: 2mm solid red;
}
hr {
  border-top: 2px dashed black;
}</style>';

    foreach ($bill_structure as $row) {

      $pay_water = ($row->meter_w_p > $row->meter_w_c)? (100000-$row->meter_w_p) + $row->meter_w_c : $row->meter_w_c - $row->meter_w_p;
      $pay_light = ($row->meter_l_p > $row->meter_l_c)? (10000-$row->meter_l_p) + $row->meter_l_c : $row->meter_l_c - $row->meter_l_p;
      $pay_water_change = $constant_data[0]->unit_water * $pay_water;
      $pay_light_change = $constant_data[0]->unit_light * $pay_light;
      $rent_fee = ($row->room_type == 'พัดลม') ? $constant_data[0]->fee_fan : $constant_data[0]->fee_air;
      $html .= '<h3 style="text-align: center"> ใบแจ้งยอด ประจำเดือน '.$row->month.' </h3>';
      if($row->room_type == 'พัดลม')
      {
        $html .= '<i> ประเภทห้อง : '.$row->room_type.' </i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i> หมายเลขห้องพัก : '.$row->room_number.' </i>';
      }
      else
      {
        $html .= '<i> ประเภทห้อง : '.$row->room_type.' </i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i> หมายเลขห้องพัก : '.$row->room_number.' </i>';

      }
      $html .= '<br><br>';
      $html .= '<table width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
      <tr style="border:1px solid #000;padding:4px;">
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">รายการ</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">ครั้งก่อน (ยูนิต)</td>
            <td  width="15%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp;ปัจจุบัน (ยูนิต)</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">จำนวนหน่วย ส่วนต่าง (ยูนิต)</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">ราคา (ยูนิต/บาท)</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">จำนวนเงิน (บาท)</td>
      </tr>
      <tr style="border:1px solid #000;padding:4px;">
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ค่าห้อง</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  colspan="4"></td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">'.$rent_fee.'</td>
      </tr>
      <tr style="border:1px solid #000;padding:4px;">
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ค่าน้ำ</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">'.$row->meter_w_p.'</td>
            <td  width="15%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp;'.$row->meter_w_c.'</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">'.$pay_water.'</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">'.$constant_data[0]->unit_water.'</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">'.$pay_water_change.'</td>
      </tr>
      <tr style="border:1px solid #000;padding:4px;">
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ค่าไฟฟ้า</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">'.$row->meter_l_p.'</td>
            <td  width="15%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp;'.$row->meter_l_c.'</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">'.$pay_light.'</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">'.$constant_data[0]->unit_light.'</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">'.$pay_light_change.'</td>
      </tr>
      <tr style="border:1px solid #000;padding:4px;">
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  colspan="5">รวม</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">'.$row->payment_amount.'</td>
      </tr>
</table>';
      $html .= '<br><br><br><br>';

    }

    $mpdf->WriteHTML($html);
    $mpdf->Output();
  }
?>
