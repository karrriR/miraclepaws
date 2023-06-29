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
    <title>Приют для животных "Чудо лапки" отвечает на вопросы!</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <header class="header-three">
        <div class="container">
            <nav class="main-menu main-menu_centerbox">
                <ul class="main-menu_wrapper">
                    <li class="main-menu_list"><a href="index.php" class="main-menu_logo"><img src="img/icons/logo_black.svg"
                                alt="logo"></a></li>
                </ul>
                <ul class="main-menu_wr">
                    <li class="main-menu_list"><a href="our_miracle_paws.php" class="main-menu_link">Наши чудо лапки</a></li>
                    <li class="main-menu_list"><a href="our_graduates.php" class="main-menu_link">Наши выпускники</a></li>
                    <li class="main-menu_list"><a href="#" class="main-menu_link">FAQ</a></li>
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
    <section class="section-faq">
        <div class="container">
            <h1 class="section-faq_title">Ответы на часто задаваемые вопросы</h1>
            <div class="section-faq_box">
                <div class="section-faq_name-box">
                    <h2 class="section-faq_name">Будущим хозяевам</h2>
                </div>
                <div class="section-faq_future-owners">
                    <div class="section-faq_faq-box">
                        <div class="section-faq_question-box">
                            <h3 class="section-faq_question">Как взять животное из приюта?</h3>
                            <svg width="28" height="16" viewBox="0 0 28 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="section-faq_arrow">
                                <path d="M2 2L14 14L26 2" stroke="black" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" /> <!-- путь -->
                            </svg> <!-- контейнер для хранения SVG графики -->
                        </div>
                        <div class="section-faq_answer-box">
                            <p class="section-faq_answer">Заранее подумайте над тем, с каким животным вам и вашей семье
                                будет
                                комфортно: с активным или спокойным, должен ли он ладить с детьми или уже имеющимися
                                питомцами.<br><br>
                                Выберите животное в разделе <a href="our_miracle_paws.php">"Наши чудо лапки"</a> и если животное пришлось вам по душе
                                заполните форму на усыновление животного, нажав кнопку "Познакомиться".<br><br>
                                Знакомство – обязательный этап пристройства. Личных встреч должно быть несколько – чтобы
                                окончательно установить дружескую связь с будущим питомцем, ведь животные из приюта по
                                началу могут быть очень осторожными и боязливыми.<br><br>
                                Во время встреч куратор будет задавать уточняющие вопросы и вы тоже можете расспросить
                                обо всём,
                                что волнует. Наши волонтёры заинтересованны в удачном пристройстве не меньше, чем
                                будущий
                                хозяин, поэтому важно проговорить все возможные сценарии.<br><br>
                                После встречи с животным подумайте над своим выбором, поспите и примите решение на
                                свежую
                                голову, без эмоций. Даже если вы влюбились в нашу кошку или собаку, возьмите несколько
                                дней на
                                размышление. Это время животное будет забронировано за вами – мы никому его не
                                отдадим.<br><br>
                                Собаки и кошки нашего приюта отправляются домой после подписания договора об
                                ответственном
                                содержании с новым владельцем. Вместе с животным мы передаем владельцу паспорт питомца с
                                отметками о вакцинации.</p>
                        </div>
                    </div>
                    <div class="section-faq_faq-box">
                        <div class="section-faq_question-box">
                            <h3 class="section-faq_question">Что купить новому питомцу?</h3>
                            <svg width="28" height="16" viewBox="0 0 28 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="section-faq_arrow">
                                <path d="M2 2L14 14L26 2" stroke="black" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="section-faq_answer-box">
                            <p class="section-faq_answer">Если вы только что завели нового питомца, то, вероятно, у вас
                                есть некоторые вопросы о том, как обеспечить ему комфортный дом. Вот несколько
                                предметов, которые могут помочь вам обеспечить новому питомцу комфорт: <br><br>
                                1. Миски для воды и корма. Помимо основного функционального предназначения,
                                систематические миски также могут служить декоративным элементом вашего дома.<br><br>
                                2. Игрушки. В зависимости от типа питомца, он может нуждаться в разных типах игрушек -
                                мягких, жестких, для тренировки умственных способностей или для физических упражнений.
                                <br><br>
                                3. Туалет или лоток. Если у вас кошка, она, скорее всего, нуждается в лотке, чтобы
                                использовать его как туалет. Ёжики, кролики, хомяки и некоторые другие мелкие животные
                                тоже могут пользоваться подобными предметами.<br><br>
                                4. Когтеточка. Если у вас кошка или другой животное, который когти затачивает плетёным
                                диваном, лучше всего купить ей когтеточку.<br><br>
                                5. Корм. Для каждого вида питомца существуют свои требования для питания, поэтому
                                тщательно изучите этот вопрос и приобретите соответствующий корм.<br><br>
                                Дополнительно также можно купить кровать для питомца, поводок или клетку, в зависимости
                                от типа животного. Эти предметы помогут обеспечить своему питомцу уютный дом и заботу,
                                которые они заслуживают.<br><br>
                            </p>
                        </div>
                    </div>
                    <div class="section-faq_faq-box">
                        <div class="section-faq_question-box">
                            <h3 class="section-faq_question">Чек лист будущего хозяина</h3>
                            <svg width="28" height="16" viewBox="0 0 28 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="section-faq_arrow">
                                <path d="M2 2L14 14L26 2" stroke="black" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="section-faq_answer-box">
                            <p class="section-faq_answer">* Вы осознаёте, что адаптация и воспитание животного потребуют
                                времени и терпения, а иногда финансовых затрат. <br><br>
                                * Если вы живёте на съёмной квартире, то арендодатель не против животных. В случае смены
                                квартиры, вы готовы искать жильё, где вас примут с питомцем. <br><br>
                                * Вы понимаете, что собаке требуются регулярные прогулки в любую погоду, а котик иногда
                                будет делать ночной тыгдык по квартире. <br><br>
                                * Потребности животного не станут отягчающими для вашего бюджета.<br><br>
                                * В вашем окружении нет людей, которые были бы против животного (даже если эти люди не
                                живут с вами постоянно).<br><br></p>
                        </div>
                    </div>
                    <div class="section-faq_faq-box">
                        <div class="section-faq_question-box">
                            <h3 class="section-faq_question">Стерилизованы и привиты ли животные в приюте?</h3>
                            <svg width="28" height="16" viewBox="0 0 28 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="section-faq_arrow">
                                <path d="M2 2L14 14L26 2" stroke="black" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="section-faq_answer-box">
                            <p class="section-faq_answer">Да, все животные в обязательном порядке стерилизуются и
                                чипируются отловом перед тем, как попадают в приют. Каждый год животные проходят
                                обязательную вакцинацию от бешенства и комплекса вирусов. Волонтёр имеет паспорт на
                                каждое животное с подтверждением вакцинации и передаёт его новому владельцу вместе с
                                подопечным.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-faq_box faq-box-two">
                <div class="section-faq_name-box-two">
                    <h2 class="section-faq_name-two">Как помочь</h2>
                </div>
                <div class="section-faq_future-owners">
                    <div class="section-faq_faq-box">
                        <div class="section-faq_question-box">
                            <h3 class="section-faq_question">Что требуется приюту?</h3>
                            <svg width="28" height="16" viewBox="0 0 28 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="section-faq_arrow">
                                <path d="M2 2L14 14L26 2" stroke="black" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="section-faq_answer-box">
                            <p class="section-faq_answer">Если вы хотите помочь приюту для животных, то, кроме денежных
                                пожертвований, можно приобрести и передать им необходимые товары и вещи. Они всегда
                                нуждаются в различных предметах, для ухода за животными и содержания приюта. <br><br>
                                Список товаров и вещей, которые необходимы приюту, вы можете посмотреть в разделе
                                <a href="help.php"> "Помочь"</a> на сайте или обратиться к нам напрямую, чтобы узнать какие предметы им
                                требуются в данный момент. Cпасибо вам за желание помочь приюту и его подопечным.</p>
                        </div>
                    </div>
                    <div class="section-faq_faq-box">
                        <div class="section-faq_question-box">
                            <h3 class="section-faq_question">Как стать волонтером?</h3>
                            <svg width="28" height="16" viewBox="0 0 28 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="section-faq_arrow">
                                <path d="M2 2L14 14L26 2" stroke="black" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="section-faq_answer-box">
                            <p class="section-faq_answer">Нужно любить животных, быть возрастом не менее 18 лет и быть
                                готовым приезжать хотя бы раз в неделю. В обязанности волонтера входит поиск дома, выгул
                                и социализация животных. Если у вас никогда не было опыта с животными, это не страшно,
                                мы всему научим. <br><br>
                                Если точно решили стать волонтёром, заполните <a href="#" onclick="openVolunteering();">форму "Заявка на волонтёрство"</a>, чтобы наш
                                приют расммотрел вашу кандидатуру.
                            </p>
                        </div>
                    </div>
                    <div class="section-faq_faq-box">
                        <div class="section-faq_question-box">
                            <h3 class="section-faq_question">Можно ли приехать погулять с животными?</h3>
                            <svg width="28" height="16" viewBox="0 0 28 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="section-faq_arrow">
                                <path d="M2 2L14 14L26 2" stroke="black" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="section-faq_answer-box">
                            <p class="section-faq_answer">Для тех, кто ещё не решился на то, хочет ли он взять собаку из
                                приюта, и тех, кто хочет помогать приюту, но не знает как, у нас есть DogDate – прогулки
                                с собаками из нашего приюта. Для того, чтобы записать на прогулку, напишите или
                                позвоните нам на указанные на сайте контактные данные.</p>
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
                            <li class="footer_section-list"><a href="#" class="footer_section-link">FAQ</a></li>
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
    <form action="#" method="get" class="form-volunteering_block">
        <div class="form-volunteering_button-box">
            <button class="form-volunteering_button" onclick="closeVolunteering();"><img src="img/icons/icon_close.svg"
                    alt="close"></button>
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
    </form>
    
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
    <script src="./js/faq.js"></script>
</body>
</html>