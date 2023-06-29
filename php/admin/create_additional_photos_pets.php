<?php
session_start();
require_once '../config/connect.php';

        $id_pets = trim($_POST['id_pets']);

        $path = '../../img/pets/';
        $types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
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

                $sql = "SELECT * FROM pets WHERE id_pets = '$id_pets'";
                $result = mysqli_query($link, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0) {
                    $sqll = "SELECT COUNT(*) as count FROM additional_photos_pets WHERE id_pets = '$id_pets'";
                    $resultt = mysqli_query($link, $sqll);
                    $row = mysqli_fetch_assoc($resultt);
                        if ($row["count"] >= 3) {
                            $_SESSION['message'] = 'Фотографий достаточно';
                            header('Location: ../../additional_photos_pets.php');
                        } else {
                            $query = "INSERT INTO `additional_photos_pets` (`id_pets`, `image_pets` ) VALUES ('$id_pets', '$nameFile')";
                            addslashes($query);
                            $res = mysqli_query($link, $query) or die (mysqli_error($link));
                            header('Location: ../../additional_photos_pets.php');
                        }
                } else {
                    $_SESSION['message'] = 'Животного с таким внешним ключом не существует';
                    header('Location: ../../additional_photos_pets.php');
            }
            }
            else {
                $_SESSION['message'] = 'Что-то пошло не так';
                header('Location: ../../additional_photos_pets.php');
            }                          
        }


?>