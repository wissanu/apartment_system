<?php
  class Vj{
      private $db;

      public function __construct(){
          $this->db = new Database;
      }

      // Get all vj
      public function getAllVj(){
          $this->db->query("SELECT b.user_id ,b.name, b.lastname, b.phone_number,a.room_type, a.room_number, a.meter_water, a.meter_light FROM room as a, customer as b WHERE a.user_id = b.user_id");
          $results = $this->db->resultSet();

          return $results;
      }

      // get specific vj from id
      public function getByVj($p, $id){
        $this->db->query("SELECT * from (SELECT b.user_id ,b.name, b.lastname, b.phone_number,a.room_type, a.room_number, a.meter_water, a.meter_light FROM room as a, customer as b WHERE a.user_id = b.user_id) as k WHERE k.$p = '$id'");
        $results = $this->db->resultSet();

        return $results;
      }

      // get specific vj from id
      public function getIdVj($id){
        $this->db->query("SELECT * from (SELECT b.user_id ,b.name, b.lastname, b.phone_number,a.room_type, a.room_number, a.meter_water, a.meter_light FROM room as a, customer as b WHERE a.user_id = b.user_id) as k WHERE k.user_id = '$id'");
        $results = $this->db->resultSet();

        return $results;
      }

      // edit vj profile
      public function editIdVj($param){
        $this->db->query("UPDATE `room` SET `room_type` = '".$param['r_type']."', `room_number` = '".$param['r_number']."', `meter_light` = '".$param['r_meter_light']."', `meter_water` = '".$param['r_meter_water']."' WHERE `user_id` = '".$param['id']."'");
        $this->db->execute();
        $this->db->query("UPDATE `customer` SET `name` = '".$param['firstname']."', `lastname` = '".$param['lastname']."', `phone_number` = '".$param['phone_number']."' WHERE `user_id` = '".$param['id']."'");
        $this->db->execute();
      }

      // add vj profile
      public function addIdVj($param){
        $start = 100;
        $tall = $param['s_tall'];
        $count = $param['s_count'];

        $list = array();
        for ($i = 1; $i <= $tall; $i++)
        {
          for ($y = 1; $y <= $count; $y++)
          {
            array_push($list,$start+$y);
          }
          $start += 100;
        }

        // create new room
        foreach($list as $data)
        {
          /*$start_d = date('Y-m-d');
          $end_d= date('Y-m-d', strtotime('+1 years'));*/
          $this->db->query("INSERT INTO `customer`(`name`, `lastname`, `phone_number`) VALUES ('','','')");
          $this->db->execute();
          $this->db->query("SELECT * FROM `customer` ORDER BY `user_id` DESC LIMIT 1");
          $last_row = $this->db->resultSet();
          $this->db->query("INSERT INTO `room`(`room_type`, `room_number`, `user_id`,`meter_light`,`meter_water`) VALUES ('','".$data."','".$last_row[0]->user_id."','0','0')");
          $this->db->execute();
          $this->db->query("INSERT INTO `lease`(`start_date`,`end_date`,`deposit`,`user_id`) VALUES (NULL, NULL,'0','".$last_row[0]->user_id."')");
          $this->db->execute();
        }

        // create constant
        /*$date = explode("/",$param['due_date']);
        $s_date = $date[2].'-'.$date[0].'-'.$date[1];*/
        $this->db->query("INSERT INTO `constant`(`unit_water`, `unit_light`,`fee_fan`, `fee_air`) VALUES ('".$param['unit_water']."', '".$param['unit_light']."', '".$param['fee_fan']."', '".$param['fee_air']."')");
        $this->db->execute();

      }

      // delete vj profile
      public function delIdVj($id){
        $this->db->query("UPDATE `customer` SET `name` = '', `lastname` = '', `phone_number` = '' WHERE `user_id` ='".$id."'");
        $this->db->execute();
        $this->db->query("UPDATE `lease` SET  `start_date`= NULL, `end_date`= NULL, `deposit` = '0' WHERE `user_id` ='".$id."'");
        $this->db->execute();
      }
  }

?>
