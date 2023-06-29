<?php 
session_start();
require_once '../config/connect.php';

if(isset($_POST['izmenenie']))
{
    $id = $_POST['id'];
    $date_event = trim($_POST['date_event']);
    $id_employees = trim($_POST['id_employees']);
    $id_pets = trim($_POST['id_pets']);
    $id_diagnosis = trim($_POST['id_diagnosis']);
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
                $queryr = "UPDATE `medical_examination` SET `date_event` = '$date_event', `id_employees` = '$id_employees', `id_pets` = '$id_pets', `id_diagnosis` = '$id_diagnosis' WHERE `id_medical_examination` = '$id'";
                mysqli_query($link, $queryr) or die(mysqli_error($link));
                $_SESSION['message'] = 'Изменения сохранены';
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
}



?>