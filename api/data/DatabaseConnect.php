<?php

class DatabaseConnect {

     private $server = "109.106.240.4";
     private $user = "u771965123_wazi";
     private $password = "Mama2000";
     private $db = "u771965123_wazi";

     public function __construct() {
     }

     public function getConnection() {

          error_reporting(0);
          mysqli_report(MYSQLI_REPORT_OFF);

          $connection = mysqli_connect($this->server, $this->user, $this->password, $this->db);
          if (mysqli_connect_errno()) 
               throw new RuntimeException('mysqli connection error: ' . mysqli_connect_error());
     

          return $connection;

     }

}