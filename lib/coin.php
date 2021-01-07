<?php
  class Coin{
      private $db;

      public function __construct(){
          $this->db = new Database;
      }

      // Get all vj
      public function getAllCoin(){
          $this->db->query("SELECT * FROM (SELECT b.lease_id ,a.room_type, a.room_number, a.user_id, a.meter_light, a.meter_water FROM room as a, lease as b WHERE a.user_id = b.user_id) as k WHERE k.user_id IN (SELECT user_id FROM `customer` WHERE name <> '' and lastname <> '' and phone_number <> '')");
          $results = $this->db->resultSet();

          return $results;
      }

      // Get the constant value
      public function getAllConstant(){
          $this->db->query("SELECT unit_water, unit_light, fee_fan, fee_air FROM constant");
          $results = $this->db->resultSet();

          return $results;
      }

      // edit the constant value
      public function editCoinConstant($param){
          $this->db->query("UPDATE `constant` SET `unit_water`='".$param['unit_water']."',`unit_light`='".$param['unit_light']."',`fee_fan`='".$param['fee_fan']."',`fee_air`='".$param['fee_air']."'");
          $this->db->execute();

          return $results;
      }

      // insert vj profile
      public function editIdCoin($param){

        $month_desribe = array("ธันวาคม","มกราคม","กุมพาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $date = explode("/", date("Y/m/d"));
        $year = $date[0];
        $month = $month_desribe[(int)$param['r_month']];

        //$s_date = $date[2].'-'.$date[0].'-'.$date[1];

        //print_r($param);
        // loop through every room that has living person.
        for($i = 0; $i < (count($param['water_fee'])); $i++)
        {
          $pay_water = ($param['water_fee_previous'][$i] > $param['water_fee'][$i])? (100000-$param['water_fee_previous'][$i]) + $param['water_fee'][$i] : $param['water_fee'][$i] - $param['water_fee_previous'][$i];
          $pay_light = ($param['light_fee_previous'][$i] > $param['light_fee'][$i])? (10000-$param['light_fee_previous'][$i]) + $param['light_fee'][$i] : $param['light_fee'][$i] - $param['light_fee_previous'][$i];
          $pay_amount = $param['rent_fee'][$i] + ($pay_water * $param['water_unit']) + ($pay_light * $param['light_unit']);

          // create new bill.
          $this->db->query("INSERT INTO `payment`(`payment_status`, `payment_amount`, `lease_id`, `year`, `month`, `meter_l_p`, `meter_w_p`, `meter_l_c`, `meter_w_c`) VALUES ('0', '".$pay_amount."', '".$param['lease_id'][$i]."', '".$year."', '".$month."', '".$param['light_fee_previous'][$i]."', '".$param['water_fee_previous'][$i]."' , '".$param['light_fee'][$i]."', '".$param['water_fee'][$i]."' )");
          $this->db->execute();

          // update meter of water on the previous with current meter.
          $this->db->query("UPDATE `room` SET `meter_water`='".$param['water_fee'][$i]."',`meter_light`='".$param['light_fee'][$i]."' WHERE `user_id` = '".$param['user_id'][$i]."'");
          $this->db->execute();
        }

      }

  }

?>
