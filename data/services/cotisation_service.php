<?php

include_once("../database_connect.php");

function save($montant, string $date, string $heure, int $idClient, int $idUser, string $mobile, string $numCompte, string $nom, $connection) {

     $query = "INSERT INTO `cotisation`(`montant`, `date`, `heure`, `idClient`, `idUser`, `mobile`, `numCompte`, `nom`) 
     VALUES ('$montant','$date','$heure','$idClient','$idUser','$mobile','$numCompte','$nom')";

     $result = mysqli_query($connection, $query);
     echo $result;
}

function all($connection) {

     $query = "SELECT * FROM `cotisation`";
     $result = mysqli_query($connection, $query);

}

?>