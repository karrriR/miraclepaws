<?php 
session_start();
require_once '../config/connect.php';

if(isset($_POST['izmenenie']))
{
        
        $idd = $_POST['id'];
        $id_pets = trim($_POST['id_pets']);
        $foto = trim($_POST['foto']);

        $path = '../../img/pets/';
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
                                $queryr = "UPDATE `additional_photos_pets` SET `id_pets` = '$id_pets', `image_pets` = '$nameFile' WHERE `id_additional_photos_pets` = '$idd'";
                                mysqli_query($link, $queryr) or die(mysqli_error($link));
                                $_SESSION['message'] = 'Сохр';
                                header('Location: ../../additional_photos_pets.php');
                            }
                    } else {
                        $_SESSION['message'] = 'Животного с таким внешним ключом не существует';
                        header('Location: ../../additional_photos_pets.php');
                }
                } else {
                            $_SESSION['message'] = 'Что-то пошло не так';
                            header('Location: ../../users.php');
                        }
            } else {
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
                                $queryr = "UPDATE `additional_photos_pets` SET `id_pets` = '$id_pets', `image_pets` = '$foto' WHERE `id_additional_photos_pets` = '$idd'";
                                mysqli_query($link, $queryr) or die(mysqli_error($link));
                                $_SESSION['message'] = 'Изменения сохранены';
                                header('Location: ../../additional_photos_pets.php');
                            }
                    } else {
                        $_SESSION['message'] = 'Животного с таким внешним ключом не существует';
                        header('Location: ../../additional_photos_pets.php');
                }
            }
                                        
        }   

}




?>