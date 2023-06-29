<?php
session_start();
require_once 'php/config/connect.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="логотип_страницы">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Наши чудо лапки ждут тебя в приюте "Чудо лапки"</title>
</head>

<body>
    <header class="header"> <!-- шапка сайта -->
        <div class="container"> <!-- открытие блока контейнера -->
            <nav class="main-menu main-menu_centerbox"> <!-- элемент секции навигации -->
                <ul class="main-menu_wrapper"> <!-- маркированный список меню -->
                    <li class="main-menu_list"><a href="#" class="main-menu_logo"><img src="img/icons/logo_black.svg"
                                alt="logo"></a></li> <!-- элемент маркированного списка (раздел меню) -->
                </ul>
                <ul class="main-menu_wr">
                    <li class="main-menu_list"><a href="our_miracle_paws.php" class="main-menu_link">Наши чудо
                            лапки</a></li>
                    <li class="main-menu_list"><a href="our_graduates.php" class="main-menu_link">Наши выпускники</a>
                    </li>
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
        <div class="intro container-main">
            <div class="intro_box">
                <h1 class="intro_title">Жизнь вместе с животными лучше!</h1> <!-- заголовок первого уровня -->
                <p class="intro_text">Самое время взять себе домашнего любимца, наши чудо лапки ждут тебя в приюте “Чудо
                    лапки”.</p> <!-- абзац -->
                    <button class="intro_button intro_link" onclick="location.href='our_miracle_paws.php'">Смотреть</button> <!-- кнопка -->
            </div>
            <div class="intro_image-box">
                <img src="img/pets/Lola1.png" alt="foto pets" class="intro_image"> <!-- изображение -->
                <div class="intro_name-box">
                    <h2 class="intro_name">Лола</h2> <!-- заголовок второго уровня -->
                    <p class="intro_age">3 года</p>
                    <img src="img/icons/arrow_black.svg" alt="arrow" class="intro_arrow">
                </div>
            </div>
        </div>
    </header>
    <section class="section-one container-main"> <!-- открытие секции -->
        <div class="section-one_about-us-box">
            <h2 class="section-one_title">О нас</h2>
            <p class="section-one_text">Наш приют Чудо лапки был основан в августе 2019 года на энтузиазме людей,
                неравнодушных к проблемам бездомных животных.<br><br>
                Приют Чудо лапки находится в Московском юго-западном административном округе (ЮЗАО). В нём проживет
                несколько сотен собак и кошек, которые мечтают найти свой дом и любящих хозяев.<br><br>
                Являясь временным домом для питомцев, мы ставим перед собой задачи по оказанию необходимой помощи кошкам
                и собакам, находящимся у нас на попечении, такие как содержание, уход, кормление, и конечно пристройство
                в семьи или к людям, готовым стать друзьями для хвостатых с непростой судьбой.
            </p>
        </div>
        <div class="section-one_image-box">
            <img src="img/elements/paws.png" alt="paws" class="section-one_image">
        </div>
    </section>
    <section class="section-two">
        <div class="container-main section-two_main-box">
            <div class="section-two_image-box">
                <div class="section-two_name-box">
                    <h2 class="section-two_name">Пират</h2>
                    <p class="section-two_age">5 лет</p>
                    <img src="img/icons/arrow_white.svg" alt="arrow" class="section-two_arrow">
                </div>
                <img src="img/pets/Pirat.png" alt="foto pets" class="section-two_image">
            </div>
            <div class="section-two_mission-box">
                <h2 class="section-two_title">Наша миссия</h2>
                <p class="section-two_text">Наш приют стремится развиваться для того, чтобы помогать еще большему
                    количеству
                    пушистых, а это значит, что он всегда открыт для принятия помощи – будь она кураторская,
                    волонтерская
                    или разовая. Мы всегда с огромной благодарностью относимся к участию людей в жизни Чудо лапок, ведь
                    питомцам ежедневно необходимы корм, лекарства, средства гигиены, которые мы всегда будем рады
                    принять в
                    дар.
                </p>
                    <button class="section-two_button section-two_link" onclick="location.href='help.php'">Помочь</button>
            </div>
        </div>
    </section>
    <section class="section-three">
        <h2 class="section-three_title">Лапки ищут дом</h2>
        <div class="section-three_arrow-box">
            <button class="section-three_button-l" onclick="slideLeft();"><img src="img/icons/arrow_left.svg"
                    alt="left"></button>
            <div class="section-three_container">
                <div class="section-three_wrapper">

                    <?php 
                     $sql = "SELECT * FROM pets WHERE adopted = 'Нет' LIMIT 7";
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

                    <div class="section-three_slide">
                        <a href="card_pets.php?id=<?= $pets['id_pets']; ?>" class="section-three_slide-link">
                            <img src="img/pets/<?= $pets['photo_pets']; ?>" alt="foto pet" class="section-three_image">
                            <div class="section-three_description-box">
                                <h3 class="section-three_name"><?= $pets['name']; ?></h3> <!-- заголовок третьего уровня -->
                                <p class="section-three_description"><?= $age; ?> <?= $suffix ?>, <?= $pets['gender_pets']; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
            <button class="section-three_button-r" onclick="slideRight();"><img src="img/icons/arrow_right.svg"
                    alt="right"></button>
        </div>
            <button class="section-three_button section-three_link" onclick="location.href='our_miracle_paws.php'">Больше лапок</button>
    </section>
    <section class="section-four">
        <div class="container-main section-four_main-box">
            <div class="section-four_help-box">
                <h2 class="section-four_title">Как помочь приюту</h2>
                <p class="section-four_text">В нашем приюте для собак и кошек социализацией, уходом, выгулом, поиском
                    хозяев
                    занимаются добровольцы-волонтёры, поэтому мы будем очень рады вашей помощи
                </p>
                <div class="section-four_methods-box">
                    <div class="section-four_method">
                        <h3 class="section-four_name-method">Стать волонтером</h3>
                        <p class="section-four_description-method">Волонтёр приезжает в приют не менее раза в неделю и
                            помогает на постоянной основе</p>
                    </div>
                    <div class="section-four_method">
                        <h3 class="section-four_name-method">Помочь с лечением</h3>
                        <p class="section-four_description-method">Иногда наши животные нуждаются в оплате сложных
                            операций
                            и терапии</p>
                    </div>
                    <div class="section-four_method">
                        <h3 class="section-four_name-method">Погулять с собаками</h3>
                        <p class="section-four_description-method">Наши подопечные грустят без общения, поэтому мы
                            всегда
                            рады вашему приезду</p>
                    </div>
                    <div class="section-four_method">
                        <h3 class="section-four_name-method">Помочь делом</h3>
                        <p class="section-four_description-method">Нам часто нужны фотографы, грумеры, водители и другие
                            талантливые люди</p>
                    </div>
                    <div class="section-four_method">
                        <h3 class="section-four_name-method">Помочь с передержкой</h3>
                        <p class="section-four_description-method">Взять животное на пару недель после операции или на
                            время
                            поиска нового дома</p>
                    </div>
                    <div class="section-four_method">
                        <h3 class="section-four_name-method">Привезти корм</h3>
                        <p class="section-four_description-method">Вы очень поможете нам, если привезёте корм и
                            инвентарь
                            для животных</p>
                    </div>
                </div>
                <div class="section-four_button-box">
                    <!-- <button class="section-four_button section-four_link" onclick="openVolunteering();">Стать волонтёром</button> -->
                    <button class="section-four_button section-four_link">Стать волонтёром</button>
                </div>

            </div>
            <div class="section-four_image-box">
                <img src="img/pets/Fishka.png" alt="foto pets" class="section-four_image">
                <div class="section-four_name-box">
                    <h2 class="section-four_name">Фишка</h2>
                    <p class="section-four_age">2 года</p>
                    <img src="img/icons/arrow_black.svg" alt="arrow" class="section-four_arrow">
                </div>
            </div>
        </div>
    </section>
    <section class="section-five container-main">
        <h2 class="section-five_title">Новости приюта</h2>
        <div class="section-five_news-box">
            <div class="section-five_new-box">
                <div class="section-five_new">
                    <h3 class="section-five_name-new">Благотворительная фотосессия “Чудо лапки”</h3>
                    <p class="section-five_description-new">В приюте для животных была организована благотворительная
                        фотосессия, которая проводилась по желанию наших добрых волонтеров.Для этого был найден
                        волонтер, который добровольно оказал нам помощь и сделал прекрасные качественные снимки
                        животных.
                        Все фотографии будут размещены на сайте и в социальных сетях приюта.
                        На фотосессии наших лапок все получили массу положительных эмоций и уникальных впечатлений.</p>
                    <p class="section-five_data-new">22.05.2023</p>
                </div>
                <img src="img/elements/new_one.png" alt="new" class="section-five_image">
            </div>
            <div class="section-five_new-box">
                <img src="img/elements/new_two.png" alt="new" class="section-five_image-two">
                <div class="section-five_new">
                    <h3 class="section-five_name-new">День Открытых дверей!</h3>
                    <p class="section-five_description-new">Мы рады объявить о предстоящем важном событии в жизни нашего
                        приюта - Дне Открытых Дверей!
                        В этот день мы приглашаем всех желающих посетить наш приют и увидеть наших прекрасных животных,
                        провести с ними время, и узнать больше о нашей деятельности и работе. Вы сможете лично
                        пообщаться с нашей командой и задать любые вопросы, которые у вас есть по этой теме.
                        Ждем вас на Дне открытых дверей в нашем приюте!</p>
                    <p class="section-five_data-new">25.06.2023</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer"> <!-- открытие футера сайта -->
        <div class="container-main">
            <div class="footer_box">
                <div class="footer_logo-box">
                    <a href="#" class="footer_logo-link"><img src="img/icons/logo_white.svg" alt="logo"
                            class="footer_logo"></a>
                </div>
                <div class="footer_menu-box">
                    <div class="footer_section">
                        <h2 class="footer_section-title">Чудо лапки</h2>
                        <ul>
                            <li class="footer_section-list"><a href="our_miracle_paws.php"
                                    class="footer_section-link">Наши чудо лапки</a></li>
                            <li class="footer_section-list"><a href="our_graduates.php"
                                    class="footer_section-link">Наши выпускники</a></li>
                            <li class="footer_section-list"><a href="FAQ.php" class="footer_section-link">FAQ</a></li>
                            <li class="footer_section-list"><a href="help.php" class="footer_section-link">Помочь</a>
                            </li>
                            <li class="footer_section-list"><a href="contacts.php"
                                    class="footer_section-link">Контакты</a></li>
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
                            <a href="#" class="footer_social-img footer_yt"><img src="img/icons/icon_youtube.svg"
                                    alt="social network"></a>
                            <a href="#" class="footer_social-img footer_wts"><img src="img/icons/icon_whatsapp.svg"
                                    alt="social network"></a>
                            <a href="#" class="footer_social-img footer_tg"><img src="img/icons/icon_telegram.svg"
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
                <div class="g-recaptcha" data-sitekey="6LeBxtMmAAAAAHY7ImyB9QdLYe9a50OFjZySI865" style=" display: flex; justify-content: center;"></div>
                <input class="form-authorization_button-authorization form-authorization_link" type="submit" name="aut" value="Авторизоваться"/>
            <a href="#" class="form-authorization_registr" onclick="openRegistr();">У вас нет аккаунта?</a>
        </div>
        <div class="message-box">
          
    </div>
    </form>
    <!-- <form action="#" method="get" class="form-volunteering_block">
        <div class="form-volunteering_button-box">
            <a class="form-volunteering_button" onclick="closeVolunteering();"><img src="img/icons/icon_close.svg"
                    alt="close"></a>
        </div>
        <div class="form-volunteering_main">
            <h1 class="form-volunteering_title">Заявка на волонтёрство</h1>
            <div class="form-volunteering_input-box">
                <input type="text" name="name" placeholder="Имя">
                <input type="text" name="surname" placeholder="Фамилия">
                <input type="email" name="email" placeholder="Email">
                <input type="tel" name="tel" placeholder="Телефон">
            </div>
                <button class="form-volunteering_button-volunteering form-volunteering_link">Отправить</button>
        </div>
        <div class="message-box">
    </div>
    </form> -->
    <script src="./js/forms.js"></script> <!-- подключение js файла -->
    <script src="./js/slider.js"></script>
    
</body>
</html>