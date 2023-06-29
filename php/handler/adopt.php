<?php
session_start();
require_once '../config/connect.php';

if(!empty($_SESSION['user'])) {
    if(isset($_POST['adopt'])) {
        $id_pets = $_POST['id'];
        $id_user = $_SESSION['user'] ['id_users'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $login = $_POST['tel'];
        $comment = $_POST['story'];
        $currentDate = date('Y-m-d');

        $sql = "SELECT * FROM application_for_adoption WHERE `id_users`='$id_user' AND `id_pets`='$id_pets'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['message'] = 'Вы уже отправили заявку';
            header('Location:' . $_SERVER['HTTP_REFERER']);
        } else {
            mysqli_query($link, "INSERT INTO `application_for_adoption` (`sending_date`, `id_users` , `id_application_status` , `id_pets` , `comment`) VALUES ('$currentDate', '$id_user' , '3' , '$id_pets' , '$comment')") or die(mysqli_error($link));
            $_SESSION['message'] = 'Ваша заявка отправлена';
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        
    }
} else {
    $_SESSION['message'] = 'Чтобы оставить заявку необходимо авторизироваться';
    header('Location:' . $_SERVER['HTTP_REFERER']);
}