
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="icon" type="image/x-icon" href="логотип_страницы">
    <title>Панель администратора</title>
</head>

<body>
    <header class="header-admin">
        <div class="container-admin">
            <nav class="main-menu main-menu_centerbox">
                <ul class="main-menu_wrapper admin-box">
                    <li class="main-menu_list"><a href="admin.php" class="main-menu_link">Панель администратора</a></li>
                </ul>
                <ul class="main-menu_wrapper">
                <li class="main-menu_list"><a href="php/handler/exit.php" class="main-menu_link">Выход</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="section-admin container-admin sect-ad">
            <div class="section-admin_requests-box">
                <h2 class="section-admin_requests-title">Статистика:</h2>
                <div class="section-admin_requests-button-box">
                    <button class="section-admin_requests-button" id="volunteers">Волонтеры</button>
                    <button class="section-admin_requests-button" id="limit">Превышен лимит</button>
                    <button class="section-admin_requests-button" id="medical_examination_request">Требуется мидицинское лечение</button>
                    <button class="section-admin_requests-button" id="quarantine_request">На карантине</button>
                    <button class="section-admin_requests-button" id="kinship">Родство</button>
                </div>
                
            </div>
            <div class="section-admin_table-box">
                <h2 class="section-admin_table-title">Таблицы:</h2>
                <div class="section-admin_table-button-box">
                    <button class="section-admin_table-button" onclick="location.href='pets.php'">Животные</button>
                    <button class="section-admin_table-button"><span class="active_link">Пользователи</span></button>
                    <button class="section-admin_table-button" onclick="location.href='workers.php'">Сотрудники</button>
                    <button class="section-admin_table-button" onclick="location.href='medical_examination.php'">Медицинский осмотр</button>
                    <button class="section-admin_table-button" onclick="location.href='quarantine.php'">Карантин</button>
                    <button class="section-admin_table-button" onclick="location.href='application_for_adoption.php'">Заявка на усыновление</button>
                    <button class="section-admin_table-button" onclick="location.href='additional_photos_pets.php'">Дополнительные фото</button>
                </div>  
            </div>
            <div class="section-admin_results-table-box" id="result">
            <?php $sql = "SELECT * FROM users LIMIT 1";
                addslashes($sql);
                $res = mysqli_query($link, $sql) or die(mysqli_error($link));
                while($qu = mysqli_fetch_object($res))
                    {
                echo "
                <div class=\"table_name-box table-name-box-two\">
                <h2 class=\"table_title-table\">Пользователи</h2>
                <a href=\"?create=$qu->id_users\"><img src=\"img/icons/icon_insert.svg\"></a>
                </div>";
                    }
                    echo "
                <div class=\"table_div table-div-two\">
                <table class=\"table_box table-div-two\">
                    <tr class=\"table_row\">
                        <th class=\"table_name-row table_id\">id</th>
                        <th class=\"table_name-row\" width=\"8%\">Имя</th>
                        <th class=\"table_name-row\" width=\"10%\">Фамилия</th> 
                        <th class=\"table_name-row\" width=\"15%\">Почта</th>
                        <th class=\"table_name-row\" width=\"10%\">Телефон</th>
                        <th class=\"table_name-row\" width=\"8%\">Логин</th>
                        <th class=\"table_name-row\" width=\"15%\">Пароль</th>
                        <th class=\"table_name-row\" width=\"10%\">Фото профиля</th>
                        <th class=\"table_name-row\" width=\"12%\">Права доступа</th>
                        <th class=\"table_name-row\">Действия</th>
                    </tr>
                </table>";
                if(isset($_GET['del'])) {
                    $id = $_GET['del'];
                    $query = "DELETE FROM users WHERE id_users=$id";
                    addslashes($query);
                    mysqli_query($link, $query) or die(mysqli_error($link));
                }
                $tableusers = "SELECT * FROM users";
                addslashes($tableusers);
                $resusers = mysqli_query($link, $tableusers) or die(mysqli_error($link));
                while($users = mysqli_fetch_object($resusers))
                    {
                        echo "
                        <div class=\"table_div-main\">
                        <table class=\"table_boxx table-main-box-two\">
                            <tr>
                            <td class=\"table_main-row table_id\">$users->id_users</td>
                            <td class=\"table_main-row\" width=\"8%\">$users->name</td>
                            <td class=\"table_main-row\" width=\"10%\">$users->surname</td>
                            <td class=\"table_main-row\" style=\"
                            max-width: 120px;
                            width: 15%;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;\">$users->email</td>
                            <td class=\"table_main-row\" width=\"10%\">$users->telephone</td>
                            <td class=\"table_main-row\" style=\"
                            max-width: 120px;
                            width: 8%;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;\">$users->login</td>
                            <td class=\"table_main-row\" style=\"
                            max-width: 220px;
                            width: 15%;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;\">$users->password</td>
                            <td class=\"table_main-row\" style=\"
                            max-width: 150px;
                            width: 10%;
                            overflow: hidden;\"><img src=\"php/admin/img/$users->photo_profile\" style=\"
                            width: 40px;
                            height: 40px
                            \"></td>
                            <td class=\"table_main-row\" width=\"12%\">$users->id_access_rights</td>
                            <td class=\"table_main-row table_action\">
                                <a href=\"?update=$users->id_users\"><img src=\"img/icons/icon_update.svg\" class=\"table_img\"></a>
                                <a href=\"?del=$users->id_users\"><img src=\"img/icons/icon_delete.svg\"></a>
                            </td>
                        </tr>
                        </table>
                        </div>
                        ";
                    }
                    echo "</div>
                    ";
                ?>
                <?php 
                    if(isset($_GET['create'])) { ?>
                    <div class="create-table">
                        <h2 class="table_title-table create-table_title">Создание записи</h2>
                        <form enctype="multipart/form-data" action="php/admin/create_users.php" method="POST" class="create-table_form" id="create_user">
                            <label class="create-table_label">Имя</label> 
                            <input type="text" name="name" class="create-table_input">
                            <label class="create-table_label">Фамилия</label> 
                            <input type="text" name="surname" class="create-table_input">
                            <label class="create-table_label">Почта</label> 
                            <input type="email" name="email" class="create-table_input">
                            <label class="create-table_label">Телефон</label> 
                            <input type="tel" name="telephone" class="create-table_input" id="phone">
                            <label class="create-table_label">Логин</label> 
                            <input type="text" name="login" class="create-table_input">
                            <label class="create-table_label">Пароль</label> 
                            <input type="password" name="password" class="create-table_input">
                            <label class="create-table_label">Фото профиля</label> 
                            <input type="file" name="img" />
                            <!-- <input type="text" name="photo_profile" class="create-table_input"> -->
                            <label class="create-table_label">Права доступа</label> 
                            <input type="text" name="id_access_rights" class="create-table_input">
                            <input type="submit" name="dov" class="create-table_button" value="Добавить"/>
                        </form>
                        <a href="users.php" class="create-table_link">Назад</a>
                        <?php 
                        if (!empty($_SESSION['message'])) {
                            echo '<p class="error r">' . $_SESSION['message'] . '</p>';
                        }
                        unset ($_SESSION['message']); ?>
                    </div>
                    <script>
                        $(document).ready(function(){
                        $('#phone').mask("+7 (999) 999-99-99");

                        $('#create_user').submit(function(event) {
                            var phoneInput = $('#phone').val();
                            var phoneNumber = phoneInput.replaceAll(/\D+/g, '');
                            $('#phone').val(phoneNumber);         
                        });
                        });

                    </script>
                <?php } ?>
                <?php 
                    if(isset($_GET['update'])) { 
                        $idD = $_GET['update'];
                        $queryy = "SELECT * FROM `users` WHERE `id_users`='$idD'";
                        addslashes($queryy);
                        $resqua = mysqli_query($link, $queryy) or die(mysqli_error($link));
                        $resj = mysqli_fetch_object($resqua);
                    ?>
                    <div class="create-table">
                        <h2 class="table_title-table create-table_title">Изменение записи</h2>
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
                            <label class="create-table_label">Права доступа</label> 
                            <input type="text" name="id_access_rights" class="create-table_input" value="<?php echo "".$resj->id_access_rights. ""; ?>">
                            <input type="submit" name="izmenenie" class="create-table_button" value="Изменить"/>
                        </form>
                        <a href="users.php" class="create-table_link">Назад</a>
                        <?php 
                        if (!empty($_SESSION['message'])) {
                            echo '<p class="error r">' . $_SESSION['message'] . '</p>';
                        }
                        unset ($_SESSION['message']); ?>
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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $("#volunteers").on("click", function() {
        $.ajax({
            url: "volunteers.php",
            type: "POST",
            dataType: "html",
            success: function(response) {
            $("#result").html(response);
            }
        });
        });
        $("#limit").on("click", function() {
        $.ajax({
            url: "limit.php",
            type: "POST",
            dataType: "html",
            success: function(response) {
            $("#result").html(response);
            }
        });
        });
        $("#medical_examination_request").on("click", function() {
        $.ajax({
            url: "medical_examination_request.php",
            type: "POST",
            dataType: "html",
            success: function(response) {
            $("#result").html(response);
            }
        });
        });
        $("#quarantine_request").on("click", function() {
        $.ajax({
            url: "quarantine_request.php",
            type: "POST",
            dataType: "html",
            success: function(response) {
            $("#result").html(response);
            }
        });
        });
        $("#kinship").on("click", function() {
        $.ajax({
            url: "kinship.php",
            type: "POST",
            dataType: "html",
            success: function(response) {
            $("#result").html(response);
            }
        });
        });
    </script>
        </div>
    </section>
</body>

</html>