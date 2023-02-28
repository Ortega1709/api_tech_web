<?php


class RechercheService
{

     private $connection;

     public function __construct(DatabaseConnect $databaseConnect)
     {
          $this->connection = $databaseConnect->getConnection();
     }

     // SELECT * FROM `cotisation` WHERE `date` BETWEEN "2022-09-17" AND "2023-02-13"; 
     // SELECT * FROM `cotisation` WHERE `date` BETWEEN "2022-09-17" AND "2023-02-13" AND `numCompte` = "xxx-xxx-xxxx"; 
     public function findCotisationSimple($date1, $date2): ?array
     {

          $data = [];
          $query = "SELECT * FROM `cotisation` WHERE `date` BETWEEN '$date1' AND '$date2'";
          $result = mysqli_query($this->connection, $query);


          if (mysqli_num_rows($result) == 0)
               return [];

          while ($row = mysqli_fetch_assoc($result))
               $data[] = $row;

          return $data;
     }

     public function findCotisation($date1, $date2, $numCompte): ?array
     {

          $data = [];
          $query = "SELECT * FROM `cotisation` WHERE `mobile` = '$numCompte' AND `date` BETWEEN '$date1' AND '$date2'";
          $result = mysqli_query($this->connection, $query);


          if (mysqli_num_rows($result) == 0)
               return [];

          while ($row = mysqli_fetch_assoc($result))
               $data[] = $row;

          return $data;
     }

     public function findBank($id): ?array {
          
          $data = [];
          $query = "SELECT * FROM `banque` WHERE `id` = '$id'";
          $result = mysqli_query($this->connection, $query);

          if (mysqli_num_rows($result) == 0)
               return [];

          while ($row = mysqli_fetch_assoc($result))
               $data[] = $row;

          return $data;
     }
}
