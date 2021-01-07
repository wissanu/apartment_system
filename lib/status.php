<?php
  class Status{
      private $db;

      public function __construct(){
          $this->db = new Database;
      }

      // Get all vj
      public function getAllStatus(){
          $desribe_m = array("ธันวาคม","มกราคม","กุมพาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
          $full_date = explode("/", date("Y/m/d"));
          $year = $full_date[0];
          $month = $desribe_m[(int)$full_date[1]];
          $month_previous = $desribe_m[(int)$full_date[1]-1];

          $this->db->query("SELECT * FROM(SELECT k.lease_id, k.room_type, k.room_number,y.meter_l_p,y.meter_w_p,y.meter_l_c,y.meter_w_c, y.year, y.month, y.payment_amount, y.payment_status,y.rent_id FROM (SELECT b.lease_id ,a.room_type, a.room_number, a.user_id FROM room as a, lease as b WHERE a.user_id = b.user_id) as k, payment as y WHERE k.lease_id = y.lease_id ORDER BY k.room_number ASC) as l WHERE l.month = '".$month."' and l.year = '".$year."'");
          $results = $this->db->resultSet();

          if(count($results)==0)
          {
            $this->db->query("SELECT * FROM(SELECT k.lease_id, k.room_type, k.room_number,y.meter_l_p,y.meter_w_p,y.meter_l_c,y.meter_w_c, y.year, y.month, y.payment_amount, y.payment_status,y.rent_id FROM (SELECT b.lease_id ,a.room_type, a.room_number, a.user_id FROM room as a, lease as b WHERE a.user_id = b.user_id) as k, payment as y WHERE k.lease_id = y.lease_id ORDER BY k.room_number ASC) as l WHERE l.month = '".$month_previous."' and l.year = '".$year."'");
            $results = $this->db->resultSet();
          }

          if(count($results) == 0){
            $this->db->query("SELECT * FROM(SELECT k.lease_id, k.room_type, k.room_number,y.meter_l_p,y.meter_w_p,y.meter_l_c,y.meter_w_c, y.year, y.month, y.payment_amount, y.payment_status,y.rent_id FROM (SELECT b.lease_id ,a.room_type, a.room_number, a.user_id FROM room as a, lease as b WHERE a.user_id = b.user_id) as k, payment as y WHERE k.lease_id = y.lease_id ORDER BY k.room_number ASC) as l WHERE l.month = '".$month_previous."' and l.year = '".($year-1)."'");
            $results = $this->db->resultSet();
          }

          return $results;
      }

      // get specific vj from id
      public function getRentStatus($id){
        $this->db->query("SELECT * FROM(SELECT c.rent_id, c.meter_l_p, c.meter_l_c, c.meter_w_p, c.meter_w_c, d.room_type FROM(SELECT a.rent_id, a.lease_id, b.user_id, a.meter_l_p, a.meter_w_p, a.meter_l_c, a.meter_w_c FROM payment as a, lease as b WHERE a.lease_id = b.lease_id) as c, room as d WHERE c.user_id = d.user_id) as e WHERE e.rent_id = '$id'");
        $results = $this->db->resultSet();

        return $results;
      }

      public function editRentStatus($param){
        $this->db->query("SELECT * from `constant`");
        $result_const = $this->db->resultSet();

        $rent_fee_update = ($param['r_type'] == 'พัดลม')? $result_const[0]->fee_fan : $result_const[0]->fee_air;
        $pay_water = ($param['meter_w_p'] > $param['meter_w_c'])? (100000-$param['meter_w_p']) + $param['meter_w_c'] : $param['meter_w_c'] - $param['meter_w_p'];
        $pay_light = ($param['meter_l_p'] > $param['meter_l_c'])? (10000-$param['meter_l_p']) + $param['meter_l_c'] : $param['meter_l_c'] - $param['meter_l_p'];
        $pay_amount = $rent_fee_update + ($pay_water * $result_const[0]->unit_water) + ($pay_light * $result_const[0]->unit_light);

        $this->db->query("UPDATE `payment` SET `meter_l_p` = '".$param['meter_l_p']."', `meter_l_c` = '".$param['meter_l_c']."', `meter_w_p` = '".$param['meter_w_p']."', `meter_w_c` = '".$param['meter_w_c']."', `payment_amount` = '".$pay_amount."' WHERE `rent_id` = '".$param['id']."'");
        $this->db->execute();
      }

      // Get all vj
      public function getByMonth($param){
          $desribe_m = array("มกราคม","กุมพาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
          $full_date = explode("/", date("Y/m/d"));
          $year = $full_date[0];
          $month = $desribe_m[$param['month_status']-1];

          $this->db->query("SELECT * FROM(SELECT k.lease_id, k.room_type, k.room_number,y.meter_l_p,y.meter_w_p,y.meter_l_c,y.meter_w_c, y.year, y.month, y.payment_amount, y.payment_status,y.rent_id FROM (SELECT b.lease_id ,a.room_type, a.room_number, a.user_id FROM room as a, lease as b WHERE a.user_id = b.user_id) as k, payment as y WHERE k.lease_id = y.lease_id ORDER BY k.room_number ASC) as l WHERE l.month = '".$month."' and l.year = '".$year."'");
          $result_m = $this->db->resultSet();

          if(count($result_m) == 0)
          {
            $this->db->query("SELECT * FROM(SELECT k.lease_id, k.room_type, k.room_number,y.meter_l_p,y.meter_w_p,y.meter_l_c,y.meter_w_c, y.year, y.month, y.payment_amount, y.payment_status,y.rent_id FROM (SELECT b.lease_id ,a.room_type, a.room_number, a.user_id FROM room as a, lease as b WHERE a.user_id = b.user_id) as k, payment as y WHERE k.lease_id = y.lease_id ORDER BY k.room_number ASC) as l WHERE l.month = '".$month."' and l.year = '".($year-1)."'");
            $result_m = $this->db->resultSet();
          }


          return $result_m;
      }


      // get month within range 6 months
      public function getMonth(){

        $this->db->query("SELECT k.month FROM (SELECT year, CASE WHEN `month` = 'มกราคม' THEN '1' WHEN `month` = 'กุมพาพันธ์' THEN '2' WHEN `month` = 'มีนาคม' THEN '3' WHEN `month` = 'เมษายน' THEN '4' WHEN `month` = 'พฤษภาคม' THEN '5' WHEN `month` = 'มิถุนายน' THEN '6' WHEN `month` = 'กรกฎาคม' THEN '7' WHEN `month` = 'สิงหาคม' THEN '8' WHEN `month` = 'กันยายน' THEN '9' WHEN `month` = 'ตุลาคม' THEN '10' WHEN `month` = 'พฤศจิกายน' THEN '11' WHEN `month` = 'ธันวาคม' THEN '12' END AS `month` FROM `payment`) as k GROUP BY k.year, k.month ORDER BY k.year DESC, k.month DESC LIMIT 6");
        $month_results = $this->db->resultSet();

        return $month_results;
      }

      // update or fix the bill payment
      public function UpdateStatus($param){

      }

      // insert vj profile
      public function editIdStatus($param){
        for($i = 0; $i < count($param['l_id']); $i++)
        {
          if($param['check'][$param['r_id'][$i]])
          {
            $this->db->query("SELECT payment_status FROM payment WHERE lease_id = '".$param['l_id'][$i]."' and rent_id = '".$param['r_id'][$i]."'");
            $results = $this->db->resultSet();
            $convert_status = ($results[0]->payment_status == 1) ? 0: 1;
            $this->db->query("UPDATE `payment` SET `payment_status` = '".$convert_status."' WHERE `lease_id` = '".$param['l_id'][$i]."' and `rent_id` = '".$param['r_id'][$i]."'");
            $this->db->execute();

          }
        }
      }

  }

?>
