<?php
session_start();
require_once '../config/connect.php';
    
        $name = trim($_POST['name']);
        $age = trim($_POST['age']);
        $weight = trim($_POST['weight']);
        $height = trim($_POST['height']);
        $wool = trim($_POST['wool']);
        $color = trim($_POST['color']);
        $history = trim($_POST['history']);
        $kinship = trim($_POST['kinship']);
        $adopted = trim($_POST['adopted']);
        $arrival_date = trim($_POST['arrival_date']);
        $limit_expiration_date = trim($_POST['limit_expiration_date']);
        $type_pets = trim($_POST['type_pets']);
        $gender_pets = trim($_POST['gender_pets']);
        $additional_photos = trim($_POST['additional_photos']);

        $path = '../../img/pets/';
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

                if ($age > 1 && $age <= 30) {
                    if ($weight > 0 && $weight <= 120) {
                        if ($height > 1 && $height <= 200) {
                            if (strcasecmp($adopted, "Да") == 0 || strcasecmp($adopted, "Нет") == 0) {
                                if (strcasecmp($type_pets, "Кошка") == 0 || strcasecmp($type_pets, "Собака") == 0) {
                                    if (strcasecmp($gender_pets, "Мальчик") == 0 || strcasecmp($gender_pets, "Девочка") == 0) {
                                        if (strcasecmp($kinship, "") == 0 ) {
                                            $query = "INSERT INTO `pets` (`name`, `age` , `weight` , `height`, `wool`, `color`, `history`, `photo_pets`, `kinship` , `adopted` 
                                        , `arrival_date`, `limit_expiration_date`, `type_pets`, `gender_pets`, `additional_photos`) 
                                        VALUES ('$name', '$age', '$weight', '$height', '$wool', '$color', '$history', '$nameFile', '', '$adopted', '$arrival_date', '$limit_expiration_date', 
                                        '$type_pets', '$gender_pets', '$additional_photos')";
                                        addslashes($query);
                                        $res = mysqli_query($link, $query) or die (mysqli_error($link));
                                        header('Location: ../../pets.php');
                                    } else {
                                        $query = "INSERT INTO `pets` (`name`, `age` , `weight` , `height`, `wool`, `color`, `history`, `photo_pets`, `kinship` , `adopted` 
                                        , `arrival_date`, `limit_expiration_date`, `type_pets`, `gender_pets`, `additional_photos`) 
                                        VALUES ('$name', '$age', '$weight', '$height', '$wool', '$color', '$history', '$nameFile', '$kinship', '$adopted', '$arrival_date', '$limit_expiration_date', 
                                        '$type_pets', '$gender_pets', '$additional_photos')";
                                        addslashes($query);
                                        $res = mysqli_query($link, $query) or die (mysqli_error($link));
                                        header('Location: ../../pets.php');
                                    }
                                        
                                        

                                    }else {
                                        $_SESSION['message'] = 'Введите правильно пол животного';
                                        header('Location: ../../pets.php');
                                    }
                                }else {
                                    $_SESSION['message'] = 'Введите правильно тип животного';
                                    header('Location: ../../pets.php');
                                }
                            }else {
                                $_SESSION['message'] = 'Введите либо Да либо Нет';
                                header('Location: ../../pets.php');
                            }
                    
                        } else {
                            $_SESSION['message'] = 'Введите правильный рост';
                            header('Location: ../../pets.php');
                        }
                    
                    } else {
                        $_SESSION['message'] = 'Введите правильный вес';
                        header('Location: ../../pets.php');
                    }
                } else {
                    $_SESSION['message'] = 'Введите возраст от 1 до 30 лет';
                    header('Location: ../../pets.php');
                }

            }
            else {
                $_SESSION['message'] = 'Что-то пошло не так';
                header('Location: ../../pets.php');
            }
                                        
        }

?>