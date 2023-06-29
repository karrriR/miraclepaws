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
    <title>Хотите помочь животным из приюта?</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <header class="header-help">
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
                    <li class="main-menu_list"><a href="#" class="main-menu_link">Помочь</a></li>
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
    <section class="section-help">
        <div class="container">
            <h1 class="section-help_title">Пожертвования</h1>
            <div class="section-help_requisites-box">
                <h2 class="section-help_requisites-title">Реквизиты для помощи</h2>
                <div class="section-help_card-box">
                    <p class="section-help_card-number">Перевод можно сделать по номеру карты: <br> <!-- перевод на следующую строку -->
                        <span class="section-help_number">5536 9141 5942 3494</span><br> <!-- выделение строки -->
                        с пометкой «приют»
                    </p>
                </div>
                <p class="section-help_choice">ИЛИ</p>
                <form action="#" method="get">
                    <button class="section-help_button section-help_link">Электронное пожертвование</button>
                </form>
            </div>
        </div>
    </section>
    <section class="container section-ways-help">
        <h2 class="section-ways-help_title">Как можно помочь приюту?</h2>
        <div class="section-ways-help_ways-box">
            <div class="section-ways-help_way-box">
                <img src="img/elements/help_one.png" alt="help" class="section-ways-help_image">
                <div class="section-ways-help_way">
                    <h3 class="section-ways-help_name-way">Стать волонтёром</h3>
                    <p class="section-ways-help_description-way">Волонтёр приезжает в приют один или несколько раз в
                        неделю, общается, гуляет с животными и ищет им семьи. Если вы хотите попробовать себя в этой
                        роли, напишите и мы расскажем, как присоединиться к команде и делать мир лучше.</p>
                </div>
            </div>
            <div class="section-ways-help_way-box">
                <img src="img/elements/help_two.png" alt="help" class="section-ways-help_image">
                <div class="section-ways-help_way">
                    <h3 class="section-ways-help_name-way">Помочь делом</h3>
                    <p class="section-ways-help_description-way">Нам требуются люди, которые помогут отвезти животное в
                        новый дом или клинику, прибраться в вольерах, утеплить их в зимний сезон и повесить теневые
                        сетки в летний, сделать фотографии собак и кошек или написать пиарный текст для анкет.</p>
                </div>
            </div>
            <div class="section-ways-help_way-box">
                <img src="img/elements/help_three.png" alt="help" class="section-ways-help_image">
                <div class="section-ways-help_way">
                    <h3 class="section-ways-help_name-way">Привезти корм и вещи</h3>
                    <p class="section-ways-help_description-way">Животные нуждаются в лечебном корме (гипоаллергенном,
                        при болезни жкт, почек, диабета и др.), обрадуются лакомствам из зоомагазина, больше всего они
                        любят вяленое мясо и субпродукты. </p>
                </div>
            </div>
            <div class="section-ways-help_way-box">
                <img src="img/elements/help_four.png" alt="help" class="section-ways-help_image">
                <div class="section-ways-help_way">
                    <h3 class="section-ways-help_name-way">Срочная помощь</h3>
                    <p class="section-ways-help_description-way">Некоторые наши подопечные нуждаются в срочном лечении
                        или операции, для которого необходимо оперативно собрать деньги. Подробнее об этих животных
                        можно узнать, написав нашим волонтёрам.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-current-needs">
        <div class="container">
            <h2 class="section-current-needs_title">Актуальные нужды</h2>
            <p class="section-current-needs_text">Наш приют для животных очень ценит любую помощь и всегда нуждается в
                дополнительной поддержке от добровольцев, пожертвователей и других людей, чьи сердца открыты для
                животных бездомных и в надобности. Если вы хотите сделать что-то действительно значимое, вы можете
                помочь даря животным в приюте еду и другие необходимые вещи, которые перечислены ниже.</p>
            <div class="section-current-needs_needs-box">
                <div class="section-current-needs_need-boxx">
                    <div class="section-current-needs_need_box">
                        <h3 class="section-current-needs_name">Консервы</h3>
                        <ol class="section-current-needs_list">
                            <li class="section-current-needs_list-product">консервы для собак («Четвероногий гурман»,
                                «Пробаланс», «Зоогурман», «Дог Ланч», «Собачье счастье»,<br> «Happy Dog», «Brit» и
                                другие)
                            </li>
                            <li class="section-current-needs_list-product">консервы Monge, Gemon
                            </li>
                            <li class="section-current-needs_list-product">лечебные консервы любые Hypoallergenic
                            </li>
                        </ol>
                    </div>
                    <div class="section-current-needs_need_box">
                        <h3 class="section-current-needs_name">Человеческая аптека</h3>
                        <ol class="section-current-needs_list">
                            <li class="section-current-needs_list-product">Габапентин 300 мг
                            </li>
                            <li class="section-current-needs_list-product">Мидантан (Амантадин) 100 мг
                            </li>
                            <li class="section-current-needs_list-product">Хлоргексидин 4%
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="section-current-needs_need_box">
                    <h3 class="section-current-needs_name">Сухой корм</h3>
                    <ol class="section-current-needs_list">
                        <li class="section-current-needs_list-product">Monge, Gemon для взрослых собак</li>
                        <li class="section-current-needs_list-product">Brit для взрослых собак</li>
                        <li class="section-current-needs_list-product">Авва для чувствительного пищеварения</li>
                        <li class="section-current-needs_list-product">Chappi, Pedigree для взрослых собак с любым
                            вкусом</li>
                        <li class="section-current-needs_list-product">Profine Adult Lamb с ягненком и картофелем</li>
                        <li class="section-current-needs_list-product">Best Dinner Sensible Adult Medium & Maxi Duck &
                            Potato</li>
                        <li class="section-current-needs_list-product">Royal Canin Urinary s/o</li>
                        <li class="section-current-needs_list-product">Royal Canin Gastro intestinal (сухой корм и
                            консервы)</li>
                        <li class="section-current-needs_list-product">Royal Canin Hypoallergenic для собак свыше 10 кг
                            (сухой корм)</li>
                        <li class="section-current-needs_list-product">Karmy Hypoallergenic Medium & Maxi (сухой корм)
                        </li>
                    </ol>
                </div>
                <div class="section-current-needs_need_box">
                    <h3 class="section-current-needs_name">Ветеринарная аптека</h3>
                    <ol class="section-current-needs_list">
                        <li class="section-current-needs_list-product">«Петкам» 2 мг</li>
                        <li class="section-current-needs_list-product">«Апоквел» 16 мг</li>
                        <li class="section-current-needs_list-product">«Синулокс» 250 или 500 мг</li>
                        <li class="section-current-needs_list-product">От блох и клещей (на 20-40 кг) «Рольф-клаб» ,
                            «Барс», «Бравекто», «Нексгард», «Симпарика»</li>
                        <li class="section-current-needs_list-product">«Каниквантел»</li>
                        <li class="section-current-needs_list-product">Антигельминтики (кроме суспензий)</li>
                        <li class="section-current-needs_list-product">«Веторил» 10 мг и 30 мг</li>
                        <li class="section-current-needs_list-product">«Да-ба релакс»</li>
                        <li class="section-current-needs_list-product">«Уро-урси»</li>
                        <li class="section-current-needs_list-product">«Осурния»</li>
                        <li class="section-current-needs_list-product">«Серения» (уколы)</li>
                        <li class="section-current-needs_list-product">«Ципровет» (капли)</li>
                        <li class="section-current-needs_list-product">«Онсиор» таб. 20,40 мг.</li>
                        <li class="section-current-needs_list-product">«Пропалин»</li>
                        <li class="section-current-needs_list-product">«Пропалин»</li>
                    </ol>
                </div>
                <div class="section-current-needs_need-boxx">
                    <div class="section-current-needs_need_box">
                        <h3 class="section-current-needs_name">Амуниция</h3>
                        <ol class="section-current-needs_list">
                            <li class="section-current-needs_list-product">брезентовые поводки (3-5 метров, рулетки НЕ
                                использем)</li>
                            <li class="section-current-needs_list-product">консервы Monge, Gemonшлейки для собак
                                Ferplast ergocomfort размер M, L</li>
                            <li class="section-current-needs_list-product">шлейки Rukka Beam или Rukka Form — XS и S
                            </li>
                            <li class="section-current-needs_list-product">медицинские перчатки( продаются коробочками в
                                аптеках, размер S,M, L)</li>
                        </ol>
                    </div>
                    <div class="section-current-needs_need_box">
                        <h3 class="section-current-needs_name">Наполнитель</h3>
                        <ol class="section-current-needs_list">
                            <li class="section-current-needs_list-product">Древесный Гигиенический наполнитель "Барсик"
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-reports">
        <div class="container section-reports_box">
            <div class="section-reports_text-box">
                <h2 class="section-reports_title">Отчет по поступлениям и расходам</h2>
                <p class="section-reports_text">Важной частью нашей работы является тщательный учет всех материальных и
                    финансовых потоков в приюте для животных. Мы высоко ценим каждое поступившее пожертвование и точно
                    фиксируем всю информацию о нем в нашей базе данных. Более того, мы также тщательно следим за каждым
                    расходом, который происходит в приюте, и ведём учет всех затрат в соответствии с принятыми
                    стандартами.</p>
            </div>
            <div class="section-reports_button-box">
                <form action="#" method="get">
                    <button class="section-reports_button section-reports_link">Поступления</button>
                </form>
                <form action="#" method="get">
                    <button class="section-reports_button-two section-reports_link">Расходы</button>
                </form>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container-main">
            <div class="footer_box">
                <div class="footer_logo-box">
                    <a href="index.html" class="footer_logo-link"><img src="img/icons/logo_white.svg" alt="logo"
                            class="footer_logo"></a>
                </div>
                <div class="footer_menu-box">
                    <div class="footer_section">
                        <h2 class="footer_section-title">Чудо лапки</h2>
                        <ul>
                            <li class="footer_section-list"><a href="our_miracle_paws.php" class="footer_section-link">Наши чудо лапки</a></li>
                            <li class="footer_section-list"><a href="our_graduates.php" class="footer_section-link">Наши выпускники</a></li>
                            <li class="footer_section-list"><a href="FAQ.php" class="footer_section-link">FAQ</a></li>
                            <li class="footer_section-list"><a href="#" class="footer_section-link">Помочь</a></li>
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