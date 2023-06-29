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
    <title>Самое лучшее животное ищет дом и заботливого хозяина!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <header class="header-card-pets">
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
                    <?php 
                        if(!empty($_SESSION['user'])) {
                            echo '<li class="main-menu_list"><a href="profile.php" class="main-menu_icon"><img
                            src="img/icons/profile.svg" alt="profile"></a></li>';
                        } else {
                            echo '<li class="main-menu_list"><a href="#" class="main-menu_icon" onclick="registr_button();"><img
                            src="img/icons/profile.svg" alt="profile"></a></li>';
                        }
                        if (!empty($_SESSION['message'])) {
                            echo '<p class="error">' . $_SESSION['message'] . '</p>';
                        }
                        unset ($_SESSION['message']);
                    ?>
                    <div id="error" class="error"></div>
                </ul>
            </nav>
        </div>
    </header>
    <?php 
        $idD = $_GET["id"];
        $queryy = "SELECT * FROM `pets` WHERE `id_pets`='$idD'";
        addslashes($queryy);
        $resqua = mysqli_query($link, $queryy) or die(mysqli_error($link));
        $resj = mysqli_fetch_assoc($resqua);
        $age = $resj["age"];
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
    <section class="container section-card-pets">
        <div class="section-card-pets_box">
            <div class="section-card-pets_slider">
                <div class="section-card-pets_slider-line">
                    <div class="section-card-pets_box-card">
                        <?php 
                         $sql = "SELECT additional_photos_pets.image_pets as image_pet FROM additional_photos_pets JOIN pets ON additional_photos_pets.id_pets = pets.additional_photos and pets.id_pets = '$idD'";
                         $result = mysqli_query($link, $sql);

                        while($pets = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <img src="img/pets/<?= $pets['image_pet']; ?>" alt="foto pets" class="section-card-pets_img">
                    <?php } ?>
                    </div>
                </div>
                <div class="section-card-pets_scroll">
                    <button class="section-card-pets_button-left" onclick="slidePrew();"><img src="img/icons/arrow_left_white.svg" alt="prew"></button>
                    <button class="section-card-pets_button-right" onclick="slideNext();"><img src="img/icons/arrow_right_white.svg" alt="next"></button>
                </div>
            </div>
            <div class="section-card-pets_parameters-box">
                <h1 class="section-card-pets_title"><?= $resj['name']; ?></h1>
                <div class="section-card-pets_parameters">
                    <div class="section-card-pets_data">
                        <h3 class="section-card-pets_data-title">Возраст:</h3>
                        <p class="section-card-pets_data-text"><?= $age; ?> <?= $suffix ?></p>
                    </div>
                    <div class="section-card-pets_data">
                        <h3 class="section-card-pets_data-title">Вес:</h3>
                        <p class="section-card-pets_data-text"><?= $resj['weight']; ?> кг</p>
                    </div>
                    <div class="section-card-pets_data">
                        <h3 class="section-card-pets_data-title">Рост:</h3>
                        <p class="section-card-pets_data-text"><?= $resj['height']; ?> см</p>
                    </div>
                    <div class="section-card-pets_data">
                        <h3 class="section-card-pets_data-title">Шерсть:</h3>
                        <p class="section-card-pets_data-text"><?= $resj['wool']; ?></p>
                    </div>
                    <div class="section-card-pets_data">
                        <h3 class="section-card-pets_data-title">Окрас:</h3>
                        <p class="section-card-pets_data-text"><?= $resj['color']; ?></p>
                    </div>
                    <div class="section-card-pets_data">
                        <h3 class="section-card-pets_data-title">Дата окончания лимита:</h3>
                        <p class="section-card-pets_data-text"><?= $resj['limit_expiration_date']; ?></p>
                    </div>
                </div>
                    <?php 
                        if(!empty($_SESSION['user'])) { ?>
                            <button class="section-card-pets_button section-card-pets_link" onclick="openAdoption();">Познакомиться</button>
                        <?php 
                        } else { ?>
                            <button class="section-card-pets_button section-card-pets_link" onclick="showMessage()">Познакомиться</button>
                       <?php } ?>
                    <script>
                        function showMessage() {
                            var messageBlock = document.getElementById("error");
                            var message = document.createElement("p");
                            message.innerText = "Сначала необходимо авторизироваться";
                            messageBlock.innerHTML = "";
                            messageBlock.appendChild(message);
                        }
                    </script>
                    <!-- <button class="section-card-pets_button section-card-pets_link" onclick="openAdoption();">Познакомиться</button> -->
            </div>
        </div>
        <div class="section-card-pets_description-box">
            <h2 class="section-card-pets_description-title">Описание питомца</h2>
            <p class="section-card-pets_description-text"><?= $resj['history']; ?></p>
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
    <form action="php/handler/adopt.php" method="post" class="form-adoption_block" id="adopt_form">
        <div class="form-adoption_button-box">
            <a class="form-adoption_button" onclick="closeAdoption();"><img src="img/icons/icon_close.svg"
                    alt="close"></a>
        </div>
        <div class="form-adoption_main">
            <h1 class="form-adoption_title">Заявка на усыновление</h1>
            <div class="form-adoption_input-box">
            <input type="hidden" name="id" value="<?= $idD ?>">
                <input type="text" name="name" placeholder="Имя" value="<?= $_SESSION['user'] ['name'] ?>" readonly>
                <input type="text" name="surname" placeholder="Фамилия" value="<?= $_SESSION['user'] ['surname'] ?>" readonly>
                <input type="email" name="email" placeholder="Email" value="<?= $_SESSION['user'] ['email'] ?>" readonly>
                <input type="tel" name="tel" id="phone" placeholder="Телефон" value="<?= $_SESSION['user'] ['telephone'] ?>" readonly>
                <textarea id="story" name="story" rows="5" cols="33" autocomplete="off" placeholder="Комментарий"></textarea>
            </div>
                <!-- <button class="form-adoption_button-adoption form-adoption_link">Отправить</button> -->
                <input class="form-adoption_button-adoption form-adoption_link" type="submit" name="adopt" value="Отправить"/>
        </div>
    </form>
    <script>
        $(document).ready(function(){
        $('#phone').mask("+7 (999) 999-99-99");

        $('#adopt_form').submit(function(event) {
            var phoneInput = $('#phone').val();
            var phoneNumber = phoneInput.replaceAll(/\D+/g, '');
            $('#phone').val(phoneNumber);         
        });
        });

    </script>
    <form action="php/handler/reg.php" method="post" class="form-registr_block" id="forma_reg"> <!-- форма -->
        <div class="form-registr_button-box">
            <a class="form-registr_button" onclick="closeRegistr();"><img src="img/icons/icon_close.svg"
                    alt="close"><a>
        </div>
        <div class="form-registr_main">
            <h1 class="form-registr_title">Регистрация</h1>
            <div class="form-registr_input-box">
                <input type="text" name="name" id="name" placeholder="Имя"> <!-- элемент формы -->
                <input type="text" name="surname" id="surname" placeholder="Фамилия">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="text" name="login" id="login" placeholder="Логин">
                <input type="tel" id="phone" name="tel" placeholder="Телефон">
                <input type="password" id="password" name="password" placeholder="Пароль">
            </div>
            <!-- <button class="form-registr_button-registr form-registr_link" name="reg">Зарегистрироваться</button> -->
            <input class="form-registr_button-registr form-registr_link" type="submit" name="reg" value="Зарегистрироваться"/>
            <a href="#" class="form-registr_autoriz" onclick="openAutoriz();">Уже есть аккаунт?</a> <!-- ссылка -->
        </div>
        <div id="message-box">
            <?php
                if (!empty($_SESSION['message'])) {
                    echo '<p>' . $_SESSION['message'] . '</p>';
                }
                unset ($_SESSION['message']);
            ?>
    </div>
    </form>
    <script>
        $(document).ready(function(){
        $('#phone').mask("+7 (999) 999-99-99");

        $('#forma_reg').submit(function(event) {
            var phoneInput = $('#phone').val();
            var phoneNumber = phoneInput.replaceAll(/\D+/g, '');
            $('#phone').val(phoneNumber);         
        });
        });

    </script>

    <form action="php/handler/auth.php" method="post" class="form-authorization_block" id="forma_a">
        <div class="form-authorization_button-box">
            <a class="form-authorization_button" onclick="closeAuthorization();"><img
                    src="img/icons/icon_close.svg" alt="close"></a>
        </div>
        <div class="form-authorization_main">
            <h1 class="form-authorization_title">Авторизация</h1>
            <div class="form-authorization_input-box">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="password" placeholder="Пароль">
            </div>
                <!-- <button class="form-authorization_button-authorization form-authorization_link" name="auth">Авторизоваться</button> -->
                <div class="g-recaptcha" data-sitekey="6LeBxtMmAAAAAHY7ImyB9QdLYe9a50OFjZySI865" style=" display: flex; justify-content: center;"></div>
                <input class="form-authorization_button-authorization form-authorization_link" type="submit" name="aut" value="Авторизоваться"/>
            <a href="#" class="form-authorization_registr" onclick="openRegistr();">У вас нет аккаунта?</a>
        </div>
        <div class="message-box">
          
    </div>
    </form>
    <script src="./js/slider_foto.js"></script>
    <script src="./js/forms.js"></script>
</body>

</html>