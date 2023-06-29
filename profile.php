<?php
session_start();
require_once 'php/config/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="логотип_страницы">
    <title>Личная страница с информацией о пользователе приюта "Чудо лапки"</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <header class="header-profile">
        <div class="container">
            <nav class="main-menu main-menu_centerbox">
                <ul class="main-menu_wrapper">
                    <li class="main-menu_list"><a href="index.php" class="main-menu_logo"><img src="img/icons/logo_black.svg"
                                alt="logo"></a></li>
                </ul>
                <ul class="main-menu_wr">
                    <li class="main-menu_list"><a href="our_miracle_paws.php" class="main-menu_link">Наши чудо лапки</a></li>
                    <li class="main-menu_list"><a href="our_graduates.php" class="main-menu_link">Наши выпускники</a></li>
                    <li class="main-menu_list"><a href="FAQ.php" class="main-menu_link">FAQ</a></li>
                    <li class="main-menu_list"><a href="help.php" class="main-menu_link">Помочь</a></li>
                    <li class="main-menu_list"><a href="contacts.php" class="main-menu_link">Контакты</a></li>
                </ul>
                <ul class="main-menu_wrapper">
                <li class="main-menu_list"><a href="php/handler/exit.php" class="main-menu_link">Выход</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="section-profile">
        <div class="container">
            <h1 class="section-profile_title">Личный кабинет</h1>
            <div class="section-profile_box">
                <div>
                <div class="section-profile_personal-data-box">
                    <div class="section-profile_personal-data">
                    <img src="php/admin/img/<?= $_SESSION['user'] ['photo_profile'] ?>" alt="foto" class="section-profile_image">
                    <!-- <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $_SESSION['user'] ['id_users'] ?>">
                        <label for="file-input">
                            <img src="php/admin/img/<?= $_SESSION['user'] ['photo_profile'] ?>" alt="foto" class="section-profile_image">
                        </label>
                        <input type="file" id="file-input" name="file-input" style="display: none">
                        <button name="izmenenie" type="submit">Upload</button>
                    </form>
                    <script>
                        const fileInput = document.getElementById('file-input');
                        const label = document.querySelector('label[for="file-input"]');

                        fileInput.addEventListener('change', function() {
                            if (fileInput.files.length > 0) {
                                label.querySelector('img').src = URL.createObjectURL(fileInput.files[0]);
                            }
                        });

                        label.addEventListener('click', function() {
                            fileInput.click();
                        });
                    </script> -->
                        <div class="section-profile_data-box">
                            <div class="section-profile_data">
                                <h3 class="section-profile_data-title">Имя:</h3>
                                <p class="section-profile_data-text"><?= $_SESSION['user'] ['name'] ?></p>
                            </div>
                            <div class="section-profile_data">
                                <h3 class="section-profile_data-title">Фамилия:</h3>
                                <p class="section-profile_data-text"><?= $_SESSION['user'] ['surname'] ?></p>
                            </div>
                            <div class="section-profile_data">
                                <h3 class="section-profile_data-title">Email:</h3>
                                <p class="section-profile_data-text"><?= $_SESSION['user'] ['email'] ?></p>
                            </div>
                            <div class="section-profile_data">
                                <h3 class="section-profile_data-title">Телефон:</h3>
                                <p class="section-profile_data-text"><?= $_SESSION['user'] ['telephone'] ?></p>
                            </div>
                            <div class="section-profile_data">
                                <h3 class="section-profile_data-title">Логин:</h3>
                                <p class="section-profile_data-text"><?= $_SESSION['user'] ['login'] ?></p>
                            </div>
                        </div>
                        <a href="?update=<?= $_SESSION['user'] ['id_users'] ?>" class="section-profile_animals-data link-update">Изменить данные</a>
                    </div>
                    <?php 
                        if (!empty($_SESSION['message'])) {
                            echo '<p class="error r">' . $_SESSION['message'] . '</p>';
                        }
                        unset ($_SESSION['message']); ?>
                </div>
                <div class="div-center-profile">
                <?php 
                    if(isset($_GET['update'])) { 
                        $idD = $_GET['update'];
                        $queryy = "SELECT * FROM `users` WHERE `id_users`='$idD'";
                        addslashes($queryy);
                        $resqua = mysqli_query($link, $queryy) or die(mysqli_error($link));
                        $resj = mysqli_fetch_object($resqua);
                    ?>
                    <div class="create-table">
                        <h2 class="table_title-table create-table_title">Изменение данных</h2>
                        <form enctype="multipart/form-data" action="php/admin/update_users.php" method="POST" class="create-table_form" id="update_user">
                            <input type="hidden" name="id" value="<?php echo "".$resj->id_users. ""; ?>">
                            <label class="create-table_label">Имя</label> 
                            <input type="text" name="name" class="create-table_input" value="<?php echo "".$resj->name. ""; ?>">
                            <label class="create-table_label">Фамилия</label> 
                            <input type="text" name="surname" class="create-table_input" value="<?php echo "".$resj->surname. ""; ?>">
                            <label class="create-table_label">Почта</label> 
                            <input type="email" name="email" class="create-table_input" value="<?php echo "".$resj->email. ""; ?>">
                            <label class="create-table_label">Телефон</label> 
                            <input type="tel" name="telephone" class="create-table_input" id="phone" value="<?php echo "".$resj->telephone. ""; ?>">
                            <label class="create-table_label">Логин</label> 
                            <input type="text" name="login" class="create-table_input" value="<?php echo "".$resj->login. ""; ?>">
                            <label class="create-table_label">Пароль</label> 
                            <input type="password" name="password" class="create-table_input" value="<?php echo "".$resj->password. ""; ?>">
                            <label class="create-table_label">Фото профиля</label> 
                            <input type="text" name="foto" class="create-table_input fot" value="<?php echo "".$resj->photo_profile. ""; ?>">
                            <input type="file" name="img" />
                            <input type="hidden" name="id_access_rights" class="create-table_input" value="<?php echo "".$resj->id_access_rights. ""; ?>">
                            <input type="submit" name="izmenenie" class="create-table_button" value="Изменить"/>
                        </form>
                        <a href="profile.php" class="create-table_link">Скрыть</a>
                    </div>
                    <script>
                        $(document).ready(function(){
                        $('#phone').mask("+7 (999) 999-99-99");

                        $('#update_user').submit(function(event) {
                            var phoneInput = $('#phone').val();
                            var phoneNumber = phoneInput.replaceAll(/\D+/g, '');
                            $('#phone').val(phoneNumber);         
                        });
                        });

                    </script>
                <?php } ?>
                </div>
                </div>
                
                <div class="section-profile_additional">
                    <div class="section-profile_additional-information-box">
                        <h2 class="section-profile_additional-information-title">Дополнительная информация</h2>
                        <div class="section-profile_information-box">
                            <div class="section-profile_information">
                                <h3 class="section-profile_information-title">Место проживания:</h3>
                                <p class="section-profile_information-text">город Москва, улица Липовый парк, корпус 2,
                                    квартира 45</p>
                            </div>
                            <div class="section-profile_information">
                                <h3 class="section-profile_information-title">Семейное положение:</h3>
                                <p class="section-profile_information-text">Замужем</p>
                            </div>
                            <div class="section-profile_information">
                                <h3 class="section-profile_information-title">Количество животных:</h3>
                                <p class="section-profile_information-text">Нет животных</p>
                            </div>
                        </div>
                    </div>
                    <div class="section-profile_adopted-animals-box">
                        <h2 class="section-profile_adopted-animals-title">Усыновленные животные</h2>
                        <div class="section-profile_animals-box">
                        <div class="section-miracle-paws_katalog-pets submitted-applications-box">
                        <?php    
                        $id_userr = $_SESSION['user'] ['id_users'];
                        $sql = "SELECT * FROM pets JOIN application_for_adoption ON pets.id_pets = application_for_adoption.id_pets WHERE application_for_adoption.id_users = '$id_userr' AND application_for_adoption.id_application_status = '1';";  
                        $result = mysqli_query($link, $sql);
                        $count = mysqli_num_rows($result);
                        if($count == 0) {
                            echo "<p class=\"section-profile_animals-data\">Нет данных</p>";
                        }
                        while($pets = mysqli_fetch_assoc($result))
                        {
                            $age = $pets["age"];
                            switch ($age) {
                                case ($age == 1):
                                    $suffix = "год";
                                    break;
                                case ($age >= 2 && $age <= 4):
                                    $suffix = "года";
                                    break;
                                case ($age >= 5 && $age <= 20):
                                    $suffix = "лет";
                                    break;
                                default:
                                    $suffix = ""; 
                            }
                            ?>
                        <div class="section-miracle-paws_slide">
                            <a href="card_pets.php?id=<?= $pets['id_pets']; ?>" class="section-miracle-paws_slide-link">
                                <img src="img/pets/<?= $pets['photo_pets']; ?>" alt="foto pet" class="section-miracle-paws_image">
                                <div class="section-miracle-paws_description-box">
                                    <h3 class="section-miracle-paws_name"><?= $pets['name']; ?></h3>
                                    <p class="section-miracle-paws_description"><?= $age; ?> <?= $suffix ?>, <?= $pets['gender_pets']; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php 
                        }
                        ?>

                        </div>
                        </div>
                    </div>
                    <div class="section-profile_submitted-applications-box">
                        <h2 class="section-profile_submitted-applications-title">Поданные заявки</h2>
                        <div class="section-profile_animals-box">

                        <div class="section-miracle-paws_katalog-pets submitted-applications-box">
                        <?php    
                        $id_userr = $_SESSION['user'] ['id_users'];
                        $sql = "SELECT * FROM pets JOIN application_for_adoption ON pets.id_pets = application_for_adoption.id_pets WHERE application_for_adoption.id_users = '$id_userr' AND application_for_adoption.id_application_status = '3';";  
                        $result = mysqli_query($link, $sql);
                        $count = mysqli_num_rows($result);
                        if($count == 0) {
                            echo "<p class=\"section-profile_animals-data\">Нет данных</p>";
                        }
                        while($pets = mysqli_fetch_assoc($result))
                        {
                            $age = $pets["age"];
                            switch ($age) {
                                case ($age == 1):
                                    $suffix = "год";
                                    break;
                                case ($age >= 2 && $age <= 4):
                                    $suffix = "года";
                                    break;
                                case ($age >= 5 && $age <= 20):
                                    $suffix = "лет";
                                    break;
                                default:
                                    $suffix = ""; 
                            }
                            ?>
                        <div class="section-miracle-paws_slide">
                            <a href="card_pets.php?id=<?= $pets['id_pets']; ?>" class="section-miracle-paws_slide-link">
                                <img src="img/pets/<?= $pets['photo_pets']; ?>" alt="foto pet" class="section-miracle-paws_image">
                                <div class="section-miracle-paws_description-box">
                                    <h3 class="section-miracle-paws_name"><?= $pets['name']; ?></h3>
                                    <p class="section-miracle-paws_description"><?= $age; ?> <?= $suffix ?>, <?= $pets['gender_pets']; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php 
                        }
                        ?>

                        </div>
                            <!-- <p class="section-profile_animals-data">Нет данных</p> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container-main">
            <div class="footer_box">
                <div class="footer_logo-box">
                    <a href="index.php" class="footer_logo-link"><img src="img/icons/logo_white.svg" alt="logo"
                            class="footer_logo"></a>
                </div>
                <div class="footer_menu-box">
                    <div class="footer_section">
                        <h2 class="footer_section-title">Чудо лапки</h2>
                        <ul>
                            <li class="footer_section-list"><a href="our_miracle_paws.php" class="footer_section-link">Наши чудо лапки</a></li>
                            <li class="footer_section-list"><a href="our_graduates.php" class="footer_section-link">Наши выпускники</a></li>
                            <li class="footer_section-list"><a href="FAQ.php" class="footer_section-link">FAQ</a></li>
                            <li class="footer_section-list"><a href="help.php" class="footer_section-link">Помочь</a></li>
                            <li class="footer_section-list"><a href="contacts.php" class="footer_section-link">Контакты</a></li>
                        </ul>
                    </div>
                    <div class="footer_sections">
                        <div class="footer_section">
                            <h2 class="footer_section-title">Режим работы</h2>
                            <p class="footer_section-text">ПН-ПТ: 10-20</p>
                            <p class="footer_section-text">СБ-ВС: 12-18</p>
                        </div>
                        <div class="footer_section">
                            <h2 class="footer_section-title footer_section-address">Адрес</h2>
                            <p class="footer_section-text">г. Москва, ул. Проспект Вернадского, д.6</p>
                        </div>
                    </div>
                    <div class="footer_section">
                        <h2 class="footer_section-title">Мы в соцсетях</h2>
                        <div class="footer_social-box">
                            <a href="#" class="footer_social-img"><img src="img/icons/icon_youtube.svg"
                                    alt="social network"></a>
                            <a href="#" class="footer_social-img"><img src="img/icons/icon_whatsapp.svg"
                                    alt="social network"></a>
                            <a href="#" class="footer_social-img"><img src="img/icons/icon_telegram.svg"
                                    alt="social network"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>