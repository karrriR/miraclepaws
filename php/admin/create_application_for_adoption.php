<?php
session_start();
require_once '../config/connect.php';
    
if(!empty($_POST['sending_date']) and !empty($_POST['id_users']) and !empty($_POST['id_application_status']) and !empty($_POST['id_pets']) and !empty($_POST['comment'])) {
if(isset($_POST['sending_date'])) {
    $sending_date = $_POST['sending_date'];
    if($sending_date === '') {
        unset($sending_date);
    }
}
if(isset($_POST['id_users'])) {
    $id_users = $_POST['id_users'];
    if($id_users === '') {
        unset($id_users);
    }
}
if(isset($_POST['id_application_status'])) {
    $id_application_status = $_POST['id_application_status'];
    if($id_application_status === '') {
        unset($id_application_status);
    }
}
if(isset($_POST['id_pets'])) {
    $id_pets = $_POST['id_pets'];
    if($id_pets === '') {
        unset($id_pets);
    }
}
if(isset($_POST['comment'])) {
    $comment = $_POST['comment'];
    if($comment === '') {
        unset($comment);
    }
}

$sql = "SELECT * FROM users WHERE id_users = '$id_users'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
if($count > 0) {
    $sql = "SELECT * FROM pets WHERE id_pets = '$id_pets'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0) {
        $sql = "SELECT * FROM application_status WHERE id_application_status = '$id_application_status'";
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0) {
            $sending_date = trim($_POST['sending_date']);
            $id_users = trim($_POST['id_users']);
            $id_application_status = trim($_POST['id_application_status']);
            $id_pets = trim($_POST['id_pets']);
            $comment = trim($_POST['comment']);

            mysqli_query($link, "INSERT INTO `application_for_adoption` (`sending_date`, `id_users` , `id_application_status`, `id_pets`, `comment`) VALUES ('$sending_date', '$id_users' , '$id_application_status', '$id_pets', '$comment' )") or die(mysqli_error($link));
            $_SESSION['message'] = 'Данные добавлены';
            header('Location: ../../application_for_adoption.php');
            
        } else {
            $_SESSION['message'] = 'Статуса с таким внешним ключом не существует';
            header('Location: ../../application_for_adoption.php');
        }
    } else {
        $_SESSION['message'] = 'Животного с таким внешним ключом не существует';
        header('Location: ../../application_for_adoption.php');
    }
} else {
    $_SESSION['message'] = 'Пользователя с таким внешним ключом не существует';
    header('Location: ../../application_for_adoption.php');
}
} else {
    $_SESSION['message'] = 'Заполните все поля';
    header('Location: ../../application_for_adoption.php');
}
?>