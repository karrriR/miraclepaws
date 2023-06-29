<?php 
session_start();
require_once 'php/config/connect.php';

if(isset($_POST['izmenenie']))
{
        $idd = $_POST['id'];
        $path = 'php/admin/img/';
        $types = array('image/gif', 'image/png', 'image/jpeg');
        $size = 1024009990;
        $namez = $_FILES['file-input']['name'];
        $ext = substr($namez, strpos($namez,'.'), strlen($namez)-1);


        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
                if (!in_array($_FILES['file-input']['type'], $types))
                die('Запрещенный тип файла.');
                if ($_FILES['file-input']['size'] > $size)
                die('Слишком большой размер файла.');
                $nameFile =  uniqid($namez).'.'.$ext;
                if (copy($_FILES['file-input']['tmp_name'], $path . $nameFile)) {
                            $queryr = "UPDATE `users` SET `photo_profile`='$nameFile' WHERE `id_users`='$idd'";
                            mysqli_query($link, $queryr) or die(mysqli_error($link));
                            $_SESSION['message'] = 'Изменения сохранены';
                            header('Location: profile.php');
                } else {
                            $_SESSION['message'] = 'Что-то пошло не так';
                            header('Location: profile.php');
                        }
                                        
        }   

}