<?php

include_once("../database_connect.php");

function save(string $libelle, $connection) {

     $query = "INSERT INTO `ville`(`libelle`) VALUES ('$libelle')";
     $result = mysqli_query($connection, $query);
}

function all($connection) {

     $query = "SELECT * FROM `ville`";
     $result = mysqli_query($connection, $query);

}

function get(int $id, $connection) {

     $query = "SELECT * FROM `ville` WHERE `id`=$id";
     $result = mysqli_query($connection, $query);

}

function update(int $id, string $libelle, $connection) {

     $query = "UPDATE `ville` SET `libelle`='$libelle' WHERE `id`=$id";
     $result = mysqli_query($connection, $query);

}



?>

