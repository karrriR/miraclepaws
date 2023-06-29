<?php 
session_start();
require_once '../config/connect.php';

if(isset($_POST['izmenenie']))
{
        
        $idd = $_POST['id'];
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);
        $telephone = trim($_POST['telephone']);
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);
        $id_access_rights = trim($_POST['id_access_rights']);
        $foto = trim($_POST['foto']);

        $path = 'img/';
        $path2 = 'php/admin/img/';
        $types = array('image/gif', 'image/png', 'image/jpeg');
        $size = 1024009990;
        $namez = $_FILES['img']['name'];
        $ext = substr($namez, strpos($namez,'.'), strlen($namez)-1);


        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(!empty($namez)) {
                if (!in_array($_FILES['img']['type'], $types))
                die('Запрещенный тип файла.');
                if ($_FILES['img']['size'] > $size)
                die('Слишком большой размер файла.');
                $nameFile =  uniqid($namez).'.'.$ext;
                if (copy($_FILES['img']['tmp_name'], $path . $nameFile)) {
                            $queryr = "UPDATE `users` SET `name` = '$name', `surname` = '$surname', `email` = '$email', `telephone` = '$telephone', `login` = '$login', `password` = '$password', `photo_profile` = '$nameFile', `id_access_rights` = '$id_access_rights' WHERE `id_users` = '$idd'";
                            mysqli_query($link, $queryr) or die(mysqli_error($link));
                            $_SESSION['message'] = 'Изменения сохранены';
                            // header('Location: ../../users.php');
                            header('Location:' . $_SERVER['HTTP_REFERER']);
                } else {
                            $_SESSION['message'] = 'Что-то пошло не так';
                            // header('Location: ../../users.php');
                            header('Location:' . $_SERVER['HTTP_REFERER']);
                        }
            } else {
                $queryr = "UPDATE `users` SET `name` = '$name', `surname` = '$surname', `email` = '$email', `telephone` = '$telephone', `login` = '$login', `password` = '$password', `photo_profile` = '$foto', `id_access_rights` = '$id_access_rights' WHERE `id_users` = '$idd'";
                mysqli_query($link, $queryr) or die(mysqli_error($link));
                $_SESSION['message'] = 'Изменения сохранены';
                // header('Location: ../../users.php');
                header('Location:' . $_SERVER['HTTP_REFERER']);
            }
                                        
        }   

}




?>