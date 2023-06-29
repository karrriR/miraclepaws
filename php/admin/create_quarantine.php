<?php
session_start();
require_once '../config/connect.php';
    
if(!empty($_POST['arrival_date']) and !empty($_POST['release_date']) and !empty($_POST['id_pets'])) {
if(isset($_POST['arrival_date'])) {
    $arrival_date = $_POST['arrival_date'];
    if($arrival_date === '') {
        unset($arrival_date);
    }
}
if(isset($_POST['release_date'])) {
    $release_date = $_POST['release_date'];
    if($release_date === '') {
        unset($release_date);
    }
}
if(isset($_POST['id_pets'])) {
    $id_pets = $_POST['id_pets'];
    if($id_pets === '') {
        unset($id_pets);
    }
}
$arrival_date = trim($_POST['arrival_date']);
$release_date = trim($_POST['release_date']);
$id_pets = trim($_POST['id_pets']);

mysqli_query($link, "INSERT INTO `quarantine` (`arrival_date`, `release_date` , `id_pets`) VALUES ('$arrival_date', '$release_date' , '$id_pets')") or die(mysqli_error($link));
$_SESSION['message'] = 'Данные добавлены';
header('Location: ../../quarantine.php');

} else {
    $_SESSION['message'] = 'Заполните все поля';
    header('Location: ../../quarantine.php');
}
?>