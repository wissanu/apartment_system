<?php
  class Job{
      private $db;

      public function __construct(){
          $this->db = new Database;
      }

      // Get all jobs
      public function getAllJobs(){
          $this->db->query("SELECT * FROM vj_profile");
          $results = $this->db->resultSet();

          return $results;
      }
  }

?>
