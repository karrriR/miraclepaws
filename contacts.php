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
    <title>Как добраться до приюта для животных "Чудо лапки"?</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <header class="header-contacts">
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
                    <li class="main-menu_list"><a href="#" class="main-menu_link">Контакты</a></li>
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
    <section class="section-contacts">
        <div class="container">
            <h1 class="section-contacts_title">Контакты</h1>
            <div class="section-contacts_contact-box">
                <div class="section-contacts_contact">
                    <div class="contact-center">
                        <h2 class="section-contacts_contact-title">Связь с нами</h2>
                        <p class="section-contacts_contact-text">Волонтёры могут проконсультировать вас по общим
                            вопросам, а
                            так же принять вашу помощь в любом виде (материальные средства, забрать собаку домой и
                            другие
                            активности)</p>
                        <div class="section-contacts_social-network-box">
                            <div class="section-contacts_social-network">
                                <a href="#" class="section-contacts_icon-box section-contacts_wts">
                                    <img src="img/icons/icon_whatsapp_white.svg" alt="social network"
                                        class="section-contacts_icon-img">
                                    <h3 class="section-contacts_social-network-name">WhatsApp</h3>
                                </a>
                            </div>
                            <div class="section-contacts_social-network">
                                <a href="#" class="section-contacts_icon-box section-contacts_tg">
                                    <img src="img/icons/icon_telegram_white.svg" alt="social network"
                                        class="section-contacts_icon-img">
                                    <h3 class="section-contacts_social-network-name">Telegram</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-contacts_contact">
                    <div class="contact-center">
                        <h2 class="section-contacts_contact-title">Адрес</h2>
                        <p class="section-contacts_contact-text">г. Москва, ул. Проспект Вернадского, д.6</p>
                        <h2 class="section-contacts_contact-title section-contacts_work-mode">Режим работы</h2>
                        <div class="section-contacts_social-network-box">
                            <div class="section-contacts_social-network">
                                <div class="section-contacts_icon-box">
                                    <h3 class="section-contacts_weekday">ПН-ПТ</h3>
                                    <p class="section-contacts_time-work">10-20</p>
                                </div>
                            </div>
                            <div class="section-contacts_social-network">
                                <div class="section-contacts_icon-box">
                                    <h3 class="section-contacts_weekday">СБ-ВС</h3>
                                    <p class="section-contacts_time-work">12-18</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container section-routes">
        <h2 class="section-routes_title">Маршрут для разных видов транспорта</h2>
        <div class="section-routes_route-box">
            <div class="section-routes_route">
                <img src="img/icons/icon_human.svg" alt="human" class="section-routes_img">
                <h3 class="section-routes_name">Пешком</h3>
                <p class="section-routes_text">В погожий день вы можете добраться пешком от станций МЦД Перерва или МЦД
                    Курьяново. Это займёт около 30-35 минут.</p>
            </div>
            <div class="section-routes_route">
                <img src="img/icons/icon_car.svg" alt="car" class="section-routes_img">
                <h3 class="section-routes_name">На машине</h3>
                <p class="section-routes_text">Самый удобный способ, чтобы добраться. Рядом с приютом есть бесплатная
                    парковка. Если вы используете каршеринг, то возле приюта можно завершить аренду только на "Сити
                    Драйв", остальные компании разрешают в этом районе лишь перевод в режим ожидания.</p>
            </div>
            <div class="section-routes_route">
                <img src="img/icons/icon_bus.svg" alt="bus" class="section-routes_img">
                <h3 class="section-routes_name">На маршрутке</h3>
                <p class="section-routes_text">От метро Проспект Вернадского идёт маршрутка №438 до остановки
                    «Батюнинский проезд» (конечная). Оттуда 10 минут пешком до нашего приюта. Следуйте прямо до поворота
                    с табличкой "Форвар</p>
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
                            <li class="footer_section-list"><a href="#" class="footer_section-link">Контакты</a></li>
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