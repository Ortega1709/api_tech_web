<?php

class ClientService
{

     private $connection;

     public function __construct(DatabaseConnect $databaseConnect)
     {
          $this->connection = $databaseConnect->getConnection();
     }

     public function get($id): ?array
     {

          $data = [];
          $query = "SELECT * FROM `client` WHERE `mobile`='$id'";
          $result = mysqli_query($this->connection, $query);

          if (mysqli_num_rows($result) == 0)
               return [];

          while ($row = mysqli_fetch_assoc($result))
               $data[] = $row;

          return $data;
     }
}


