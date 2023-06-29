<?php
session_start();
require_once '../config/connect.php';
    
if(!empty($_POST['name']) and !empty($_POST['surname']) and !empty($_POST['email']) and !empty($_POST['telephone']) and !empty($_POST['login']) and !empty(md5($_POST['password'])) and !empty($_POST['img']) and !empty($_POST['id_access_rights'])) { 
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);
        $telephone = trim($_POST['telephone']);
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);
        $id_access_rights = trim($_POST['id_access_rights']);

        $path = 'img/';
        $path2 = 'php/admin/img/';
        $types = array('image/gif', 'image/png', 'image/jpeg');
        $size = 1024009990;
        $namez = $_FILES['img']['name'];
        $ext = substr($namez, strpos($namez,'.'), strlen($namez)-1);


        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (!in_array($_FILES['img']['type'], $types))
            die('Запрещенный тип файла.');
            if ($_FILES['img']['size'] > $size)
            die('Слишком большой размер файла.');
            $nameFile =  uniqid($namez).'.'.$ext;
            if (copy($_FILES['img']['tmp_name'], $path . $nameFile)) {

                $sql = "SELECT * FROM users WHERE login = '$login'";
                $result = mysqli_query($link, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0) {
                    $_SESSION['message'] = 'Такой логин уже существует. Придумайте другой';
                    header('Location: ../../users.php');
                } else {
                $query = "INSERT INTO `users` (`name`, `surname` , `email` , `telephone`, `login`, `password`, `photo_profile`, `id_access_rights`) VALUES ('$name', '$surname', '$email', '$telephone', '$login', '$password', '$nameFile', '$id_access_rights')";
                addslashes($query);
                $res = mysqli_query($link, $query) or die (mysqli_error($link));
                header('Location: ../../users.php');
            }
            }
            else {
                $_SESSION['message'] = 'Что-то пошло не так';
                header('Location: ../../users.php');
            }                          
        }
} else {
    $_SESSION['message'] = 'Заполните все поля';
    header('Location: ../../users.php');
}
?>