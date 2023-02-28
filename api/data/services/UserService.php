<?php 

class UserService {

     private $connection;

     public function __construct(DatabaseConnect $databaseConnect) {
          $this->connection = $databaseConnect->getConnection();
     }

     public function all(): ?array {

          $data = [];
          $query = "SELECT * FROM `user`";
          $result = mysqli_query($this->connection, $query);

          if (mysqli_num_rows($result) == 0)
               return [];

          while ($row = mysqli_fetch_assoc($result))
               $data[] = $row;

          return $data;
     }

     public function authentication($username, $password): null|array {

          $query = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
          $result = mysqli_query($this->connection, $query);

          if (mysqli_num_rows($result) == 1) {
               $data = mysqli_fetch_assoc($result);
               if ($data["type"] == 1){
                    return $data;
               } else {
                    return [];
               }
          } else {
               return [];
          }
     }
}
