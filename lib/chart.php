<?php
  class Chart{
      private $db;

      public function __construct(){
          $this->db = new Database;
      }

      // Get all vj
      public function getChartProfit(){
          $dataPoints = array();
          $this->db->query("SELECT SUM(payment_amount) as payment_amount,month FROM `payment` WHERE payment_status = 1 GROUP BY year, month ORDER BY 2 DESC LIMIT 6");
          $results = $this->db->resultSet();

          foreach($results as $row){
              array_push($dataPoints, array("y"=> $row->payment_amount, "label"=> $row->month));
          }
          return $dataPoints;
      }

      // Get all vj
      public function getChartNoPay(){
          $dataPoints = array();
          $this->db->query("SELECT f.room_number,SUM(f.c_room) as sum_room FROM(SELECT e.room_number , COUNT(e.room_number)as c_room, e.year, e.month FROM(SELECT c.room_type, c.room_number, d.payment_status, d.year, d.month FROM (SELECT a.room_type,a.room_number,a.user_id,b.lease_id FROM `room` as a, `lease` as b WHERE a.user_id = b.user_id) as c, payment as d WHERE c.lease_id = d.lease_id) as e WHERE e.payment_status = '0' GROUP BY e.year, e.month, e.room_number) as f GROUP BY f.room_number");
          $results = $this->db->resultSet();

          foreach($results as $row){
              array_push($dataPoints, array("y"=> $row->sum_room, "label"=> $row->room_number));
          }
          return $dataPoints;
      }


  }

?>
