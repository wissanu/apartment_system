<?php
  class Admin{
      private $db;

      public function __construct(){
          $this->db = new Database;
      }

      // Get all admin
      public function getAllAdmin(){
          $this->db->query("SELECT * FROM admin_info");
          $results = $this->db->resultSet();

          return $results;
      }

      // get specific admin from id
      public function getByAdmin($p, $id){
        $this->db->query("SELECT * FROM admin_info WHERE $p = '$id'");
        $results = $this->db->resultSet();

        return $results;
      }

      // get specific admin from id
      public function getIdAdmin($id){
        $this->db->query("SELECT * FROM admin_info WHERE admin_id = '$id'");
        $results = $this->db->resultSet();

        return $results;
      }

      // edit admin profile
      public function editIdAdmin($param){
        $this->db->query("UPDATE `admin_info` SET `admin_name` = '".$param['admin_name']."', `admin_email` = '".$param['admin_email']."', `admin_password` = '".$param['admin_password']."' WHERE `admin_id` = '".$param['admin_id']."'");
        $this->db->execute();
      }

      // delete admin profile
      public function delIdAdmin($id){
        $this->db->query("DELETE FROM `admin_info` WHERE `admin_id` ='".$id."'");
        $this->db->execute();
      }

      // get specific admin from email and password
      public function getUserAdmin($email, $pass){
        $this->db->query("SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$pass'");
        $results = $this->db->resultSet();

        return $results;
      }
  }

?>
