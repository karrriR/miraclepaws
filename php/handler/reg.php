<?php
session_start();

require_once '../config/connect.php';


if(isset($_POST['reg']))
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $tel = $_POST['tel'];
    $password = md5($_POST['password']);


    if(!empty($_POST['login']) and !empty(md5($_POST['password'])) and !empty($_POST['email']) and !empty($_POST['tel']) and !empty($_POST['surname']) and !empty($_POST['name'])) {
        if(!empty($_POST['login'])) {
          $sql = "SELECT * FROM users WHERE login = '$login'";
          $result = mysqli_query($link, $sql);
          $count = mysqli_num_rows($result);
                if($count > 0) {
                    $_SESSION['message'] = 'Такой логин уже существует. Придумайте другой';
                    header('Location:' . $_SERVER['HTTP_REFERER']);
                } else {
                    if(iconv_strlen($_POST['password'])>=8) {
                      if(preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $_POST['email'])) {
                        if(!empty($_POST['tel'])) {
                            mysqli_query($link, "INSERT INTO `users` (`name`, `surname`, `email`, `login`, `telephone`, `password`, `id_access_rights`) VALUES ('$name', '$surname', '$email', '$login', '$tel', '$password', '1')") or die(mysqli_error($link));
                            $_SESSION['message'] = 'Регистрация прошла успешно';
                            header('Location:' . $_SERVER['HTTP_REFERER']);
                        }
                      } else {
                        $_SESSION['message'] = 'Email должен содержать символ @. Введите правильный email.';
                        header('Location:' . $_SERVER['HTTP_REFERER']);
                      } 
                    } elseif (iconv_strlen($_POST['password'])< 8) {
                      $_SESSION['message'] = 'Пароль должен состоять минимум из 6 символов. Введите правильный пароль.';
                      header('Location:' . $_SERVER['HTTP_REFERER']);
                    } else {
                    $_SESSION['message'] = 'Введите данные в поле логин.';
                    header('Location:' . $_SERVER['HTTP_REFERER']);
                  }
                }
        }
    } else {
        $_SESSION['message'] = 'Сначала введите все данные в поля.';
        header('Location:' . $_SERVER['HTTP_REFERER']);
        
    }
} 

?>