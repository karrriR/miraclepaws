<?php
session_start();
require_once '../config/connect.php';
    
if(!empty($_POST['surname']) and !empty($_POST['name']) and !empty($_POST['middle_name']) and !empty($_POST['date_of_birth']) and !empty($_POST['id_gender_human'])) {
if(isset($_POST['surname'])) {
    $surname = $_POST['surname'];
    if($surname === '') {
        unset($surname);
    }
}
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    if($name === '') {
        unset($name);
    }
}
if(isset($_POST['middle_name'])) {
    $middle_name = $_POST['middle_name'];
    if($middle_name === '') {
        unset($middle_name);
    }
}
if(isset($_POST['date_of_birth'])) {
    $date_of_birth = $_POST['date_of_birth'];
    if($date_of_birth === '') {
        unset($date_of_birth);
    }
}
if(isset($_POST['id_gender_human'])) {
    $id_gender_human = $_POST['id_gender_human'];
    if($id_gender_human === '') {
        unset($id_gender_human);
    }
}
if ($id_gender_human == 1 || $id_gender_human == 2) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $middle_name = trim($_POST['middle_name']);
    $date_of_birth = trim($_POST['date_of_birth']);
    $id_gender_human = trim($_POST['id_gender_human']);

    mysqli_query($link, "INSERT INTO `employees` (`surname`, `name` , `middle_name`, `date_of_birth` , `id_gender_human`) VALUES ('$surname', '$name' , '$middle_name', '$date_of_birth' , '$id_gender_human')") or die(mysqli_error($link));
    $_SESSION['message'] = 'Данные добавлены';
    header('Location: ../../workers.php');
} else {
    $_SESSION['message'] = 'Введите либо 1, если пол "м", либо 2, если пол "ж"';
    header('Location: ../../workers.php');
}


} else {
    $_SESSION['message'] = 'Заполните все поля';
    header('Location: ../../workers.php');
}
?>