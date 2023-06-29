<?php 
session_start();
require_once '../config/connect.php';

if(isset($_POST['izmenenie']))
{
    $id = $_POST['id'];
    $sending_date = trim($_POST['sending_date']);
    $id_users = trim($_POST['id_users']);
    $id_application_status = trim($_POST['id_application_status']);
    $id_pets = trim($_POST['id_pets']);
    $comment = trim($_POST['comment']);

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
                $queryr = "UPDATE `application_for_adoption` SET `sending_date` = '$sending_date', `id_users` = '$id_users', `id_application_status` = '$id_application_status', `id_pets` = '$id_pets', `comment` = '$comment' WHERE `id_application_for_adoption` = '$id'";
                mysqli_query($link, $queryr) or die(mysqli_error($link));
                $_SESSION['message'] = 'Изменения сохранены';
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
}
?>