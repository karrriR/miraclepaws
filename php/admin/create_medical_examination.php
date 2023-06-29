<?php
session_start();
require_once '../config/connect.php';
    
if(!empty($_POST['date_event']) and !empty($_POST['id_employees']) and !empty($_POST['id_pets']) and !empty($_POST['id_diagnosis'])) {
if(isset($_POST['date_event'])) {
    $date_event = $_POST['date_event'];
    if($date_event === '') {
        unset($date_event);
    }
}
if(isset($_POST['id_employees'])) {
    $id_employees = $_POST['id_employees'];
    if($id_employees === '') {
        unset($id_employees);
    }
}
if(isset($_POST['id_pets'])) {
    $id_pets = $_POST['id_pets'];
    if($id_pets === '') {
        unset($id_pets);
    }
}
if(isset($_POST['id_diagnosis'])) {
    $id_diagnosis = $_POST['id_diagnosis'];
    if($id_diagnosis === '') {
        unset($id_diagnosis);
    }
}

$sql = "SELECT * FROM employees WHERE id_employees = '$id_employees'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
if($count > 0) {
    $sql = "SELECT * FROM pets WHERE id_pets = '$id_pets'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0) {
        $sql = "SELECT * FROM diagnosis WHERE id_diagnosis = '$id_diagnosis'";
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0) {
            $date_event = trim($_POST['date_event']);
            $id_employees = trim($_POST['id_employees']);
            $id_pets = trim($_POST['id_pets']);
            $id_diagnosis = trim($_POST['id_diagnosis']);

            mysqli_query($link, "INSERT INTO `medical_examination` (`date_event`, `id_employees` , `id_pets`, `id_diagnosis`) VALUES ('$date_event', '$id_employees' , '$id_pets', '$id_diagnosis' )") or die(mysqli_error($link));
            $_SESSION['message'] = 'Данные добавлены';
            header('Location: ../../medical_examination.php');
            
        } else {
            $_SESSION['message'] = 'Диагноза с таким внешним ключом не существует';
            header('Location: ../../medical_examination.php');
        }
    } else {
        $_SESSION['message'] = 'Животного с таким внешним ключом не существует';
        header('Location: ../../medical_examination.php');
    }
} else {
    $_SESSION['message'] = 'Сотрудника с таким внешним ключом не существует';
    header('Location: ../../medical_examination.php');
}
} else {
    $_SESSION['message'] = 'Заполните все поля';
    header('Location: ../../medical_examination.php');
}
?>