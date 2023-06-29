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
    <title>Найдите себе домашнего любимца в приюте "Чудо лапки"</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <header class="header-one">
        <div class="container">
            <nav class="main-menu main-menu_centerbox">
                <ul class="main-menu_wrapper">
                    <li class="main-menu_list"><a href="index.php" class="main-menu_logo"><img src="img/icons/logo_black.svg"
                                alt="logo"></a></li>
                </ul>
                <ul class="main-menu_wr">
                    <li class="main-menu_list"><a href="#" class="main-menu_link">Наши чудо лапки</a></li>
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
                </ul>
            </nav>
        </div>
    </header>
    <section class="section-miracle-paws">
        <div class="container">
            <h1 class="section-miracle-paws_title">Они ищут дом</h1>
            <div class="section-miracle-paws_box">
                <div class="section-miracle-paws_filter-box">
                    <form class="section-miracle-paws_filter" method="get">
                        <h2 class="section-miracle-paws_filter-title">Найди лапку по фильтрам</h2>
                        <p class="section-miracle-paws_filter-text">Подберите себе наиболее подходящее животное по соответствующим фильтрам.</p>
                        <div class="section-miracle-paws_parameters-box">
                            <h3 class="section-miracle-paws_parameter-name">Вид</h3>
                            <div class="section-miracle-paws_parameter-box">
                                <div class="section-miracle-paws_parameter">
                                    <input type="radio" name="type" value="Кошка" id="cat">
                                    <label for="cat" class="section-miracle-paws_label">Кошка</label> <!-- текстовая метка для элемента input -->
                                </div>
                                <div class="section-miracle-paws_parameter">
                                    <input type="radio" name="type" value="Собака" id="dog">
                                    <label for="dog" class="section-miracle-paws_label">Собака</label>
                                </div>
                            </div>
                            <h3 class="section-miracle-paws_parameter-name">Пол</h3>
                            <div class="section-miracle-paws_parameter-box">
                                <div class="section-miracle-paws_parameter">
                                    <input type="radio" name="gender" value="Девочка" id="girl">
                                    <label for="girl" class="section-miracle-paws_label">Девочка</label>
                                </div>
                                <div class="section-miracle-paws_parameter">
                                    <input type="radio" name="gender" value="Мальчик" id="boy">
                                    <label for="boy" class="section-miracle-paws_label">Мальчик</label>
                                </div>
                            </div>
                            <h3 class="section-miracle-paws_parameter-name">Возраст</h3>
                            <div class="section-miracle-paws_parameter-boxx">
                            <input type="number" name="age" min="1" max="20" class="section-miracle-paws_range" placeholder="Выберите возраст">
                            </div>
                        </div>
                            <input class="section-miracle-paws_button section-miracle-paws_link"  type="submit" name="search" value="Поиск">
                            <?php if (!empty($_GET)): ?>
                                <a href="?" class="section-miracle-paws_button-two section-miracle-paws_link-two">Сбросить фильтры</a>
                            <?php endif; ?>
                    </form>
                </div>
                <div class="section-miracle-paws_katalog-pets">
                    <?php 
                    $type = $_GET['type'] ?? '';
                    $gender = $_GET['gender'] ?? '';
                    $age = $_GET['age'] ?? '';
                    
                    $sql = "SELECT * FROM pets WHERE adopted = 'Нет' AND 1=1";
                    if (!empty($type)) {
                        $sql .= " AND type_pets = '$type'";
                    }
                    if (!empty($gender)) {
                        $sql .= " AND gender_pets = '$gender'";
                    }
                    if (!empty($age)) {
                        $sql .= " AND age = $age";
                    }
                    
                    $result = mysqli_query($link, $sql);

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
                            <li class="footer_section-list"><a href="#" class="footer_section-link">Наши чудо лапки</a></li>
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
    <script src="./js/forms.js"></script>
</body>

</html>