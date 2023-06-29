<?php 
session_start();
require_once '../config/connect.php';

if(isset($_POST['izmenenie']))
{
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $middle_name = trim($_POST['middle_name']);
    $date_of_birth = trim($_POST['date_of_birth']);
    $id_gender_human = trim($_POST['id_gender_human']);

    $queryr = "UPDATE `employees` SET `surname` = '$surname', `name` = '$name', `middle_name` = '$middle_name', `date_of_birth` = '$date_of_birth', `id_gender_human` = '$id_gender_human' WHERE `id_employees` = '$id'";
    mysqli_query($link, $queryr) or die(mysqli_error($link));
    $_SESSION['message'] = 'Изменения сохранены';
    header('Location: ../../workers.php');
}




?>