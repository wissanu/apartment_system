<?php
  class Bill{
      private $db;

      public function __construct(){
          $this->db = new Database;
      }

      public function getAllmonth(){
          $this->db->query("SELECT month FROM `payment` GROUP BY year, month ORDER BY 1 DESC LIMIT 6");
          $results = $this->db->resultSet();

          return $results;
      }

      public function getAlldata($param){
          $f_date = explode("/", date("Y/m/d"));
          $year = $f_date[0];
          $this->db->query("SELECT * FROM(SELECT c.room_type, c.room_number, d.meter_l_p, d.meter_w_p, d.meter_l_c, d.meter_w_c, d.payment_amount, d.year, d.month FROM(SELECT a.room_type, a.room_number, a.user_id, b.lease_id FROM `room` as a, `lease` as b WHERE a.user_id = b.user_id) as c, payment as d WHERE c.lease_id = d.lease_id) as e WHERE e.year = '".$year."' and e.month ='".$param['r_month']."'");
          $results = $this->db->resultSet();

          if(count($results) == 0)
          {
            $this->db->query("SELECT * FROM(SELECT c.room_type, c.room_number, d.meter_l_p, d.meter_w_p, d.meter_l_c, d.meter_w_c, d.payment_amount, d.year, d.month FROM(SELECT a.room_type, a.room_number, a.user_id, b.lease_id FROM `room` as a, `lease` as b WHERE a.user_id = b.user_id) as c, payment as d WHERE c.lease_id = d.lease_id) as e WHERE e.year = '".($year-1)."' and e.month ='".$param['r_month']."'");
            $results = $this->db->resultSet();
          }
          return $results;
      }

      public function getConstantdata(){
          $this->db->query("SELECT * FROM `constant`");
          $result_const = $this->db->resultSet();

          return $result_const;
      }


  }

?>
