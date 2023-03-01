<?php

class DatabaseConnect {

     private $server = "**************";
     private $user = "*************";
     private $password = "********";
     private $db = "********";

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
