<?php 
session_start();
require_once '../config/connect.php';

if(isset($_POST['izmenenie']))
{
    $id = $_POST['id'];
    $arrival_date = $_POST['arrival_date'];
    $release_date = $_POST['release_date'];
    $id_pets = $_POST['id_pets'];

    $queryr = "UPDATE `quarantine` SET `arrival_date` = '$arrival_date', `release_date` = '$release_date', `id_pets` = '$id_pets' WHERE `id_quarantine` = '$id'";
    mysqli_query($link, $queryr) or die(mysqli_error($link));
    $_SESSION['message'] = 'Изменения сохранены';
    header('Location: ../../quarantine.php');
}




?>