<?php
  class News{
      private $db;

      public function __construct(){
          $this->db = new Database;
      }

      // Get all admin
      public function getAllNews(){
          $this->db->query("SELECT b.user_id ,b.name, b.lastname, b.phone_number,DATE_FORMAT(a.start_date,'%m/%d/%Y') as start_date, DATE_FORMAT(a.end_date,'%m/%d/%Y') as end_date, a.deposit FROM lease as a, customer as b WHERE a.user_id = b.user_id");
          $results = $this->db->resultSet();

          return $results;
      }

      // get specific admin from id
      public function getByNews($p, $id){
        $this->db->query("SELECT * from (SELECT b.user_id ,b.name, b.lastname, b.phone_number,DATE_FORMAT(a.start_date,'%m/%d/%Y') as start_date, DATE_FORMAT(a.end_date,'%m/%d/%Y') as end_date, a.deposit, a.lease_id FROM lease as a, customer as b WHERE a.user_id = b.user_id) as k WHERE k.$p = '$id'");
        $results = $this->db->resultSet();

        return $results;
      }

      // get specific admin from id
      public function getIdNews($id){
        $this->db->query("SELECT * from (SELECT b.user_id ,b.name, b.lastname, b.phone_number,DATE_FORMAT(a.start_date,'%m/%d/%Y') as start_date, DATE_FORMAT(a.end_date,'%m/%d/%Y') as end_date, a.deposit, a.lease_id FROM lease as a, customer as b WHERE a.user_id = b.user_id) as k WHERE k.user_id = '$id'");
        $results = $this->db->resultSet();

        return $results;
      }

      // edit admin profile
      public function editIdNews($param){
        $date = explode("/",$param['s_date']);
        $s_date = $date[2].'-'.$date[0].'-'.$date[1];
        $date = explode("/",$param['e_date']);
        $e_date = $date[2].'-'.$date[0].'-'.$date[1];

        $this->db->query("UPDATE `lease` SET `start_date` = '".$s_date."', `end_date` = '".$e_date."', `deposit` = '".$param['deposit']."' WHERE `user_id` = '".$param['id']."'");
        $this->db->execute();
      }

      // delete admin profile
      public function delIdNews($id){
        $this->db->query("UPDATE `lease` SET  `start_date`= NULL, `end_date`= NULL, `deposit` = '0' WHERE `user_id` ='".$id."'");
        $this->db->execute();
      }
  }

?>
