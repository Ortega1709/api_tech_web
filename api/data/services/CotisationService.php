<?php 


class CotisationService {

     private $connection;
     private $managerTime;

     public function __construct(DatabaseConnect $databaseConnect, ManagerTime $managerTime) {
          $this->connection = $databaseConnect->getConnection();
          $this->managerTime = $managerTime;
     }

     public function all(): array {

          $data = [];
          $query = "SELECT * FROM `cotisation`";
          $result = mysqli_query($this->connection, $query);


          if (mysqli_num_rows($result) == 0)
               return [];

          while ($row = mysqli_fetch_assoc($result))
               $data[] = $row;

          return $data;
     }

     public function userCotisation($id) {
          $query = "SELECT * FROM `cotisation` WHERE `idUser` = '$id'";
          $result = mysqli_query($this->connection, $query);

          if (mysqli_num_rows($result) == 0) {
               return 0;
          } 
          return mysqli_num_rows($result);
     }
 
     public function get(string $id): array {

          $data = [];
          $query = "SELECT * FROM `cotisation` WHERE `id`=$id";
          $result = mysqli_query($this->connection, $query);

          if (mysqli_num_rows($result) == 0)
               return [];

          while ($row = mysqli_fetch_assoc($result))
               $data[] = $row;

          return $data;
     }

     public function save($data) {

          $montant = $data->montant;
          $date = $this->managerTime->getJourDate();
          $heure = $this->managerTime->getHeure();
          $idClient = $data->idClient;
          $idUser = $data->idUser;
          $mobile = $data->mobile;
          $numCompte = $data->numCompte;
          $nom = $data->nom;
     
          $query = "INSERT INTO `cotisation`(`montant`, `date`, `heure`, `idClient`, `idUser`, `mobile`, `numCompte`, `nom`) 
                    VALUES ('$montant','$date','$heure','$idClient','$idUser','$mobile','$numCompte','$nom')";

          $result = mysqli_query($this->connection, $query);
          if ($result) {
               return true;
          } else return false;
     }

}


?>