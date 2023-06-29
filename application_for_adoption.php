
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
    <section class="section-admin container-admin">
        <div class="section-profile_personal-data-box">
            <div class="section-profile_personal-data">
                <img src="img/elements/profile_foto.jpeg" alt="foto" class="section-profile_image">
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
            </div>
        </div>
        <div class="section-admin_main-box">
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
                    <button class="section-admin_table-button" onclick="location.href='users.php'">Пользователи</button>
                    <button class="section-admin_table-button" onclick="location.href='workers.php'">Сотрудники</button>
                    <button class="section-admin_table-button" onclick="location.href='medical_examination.php'">Медицинский осмотр</button>
                    <button class="section-admin_table-button" onclick="location.href='quarantine.php'">Карантин</button>
                    <button class="section-admin_table-button"><span class="active_link">Заявка на усыновление</span></button>
                    <button class="section-admin_table-button" onclick="location.href='additional_photos_pets.php'" >Дополнительные фото</button>
                </div>  
            </div>
            <div class="section-admin_results-table-box" id="result">
            <?php $sql = "SELECT * FROM application_for_adoption LIMIT 1";
                addslashes($sql);
                $res = mysqli_query($link, $sql) or die(mysqli_error($link));
                while($qu = mysqli_fetch_object($res))
                    {
                echo "
                <div class=\"table_name-box\">
                <h2 class=\"table_title-table\">Заявки на усыновление</h2>
                <a href=\"?create=$qu->id_application_for_adoption\"><img src=\"img/icons/icon_insert.svg\"></a>
                </div>";
                    }
                    echo "
                <div class=\"table_div\">
                <table class=\"table_box\">
                    <tr class=\"table_row\">
                        <th class=\"table_name-row table_id\">id</th>
                        <th class=\"table_name-row\" width=\"20%\">Дата отправки</th>
                        <th class=\"table_name-row\">Пользователь</th> 
                        <th class=\"table_name-row\">Статус</th>
                        <th class=\"table_name-row\">Животное</th>
                        <th class=\"table_name-row\">Комментарий</th>
                        <th class=\"table_name-row\">Действия</th>
                    </tr>
                </table>";
                if(isset($_GET['del'])) {
                    $id = $_GET['del'];
                    $query = "DELETE FROM application_for_adoption WHERE id_application_for_adoption=$id";
                    addslashes($query);
                    mysqli_query($link, $query) or die(mysqli_error($link));
                }
                $tableapplication_for_adoption = "SELECT * FROM application_for_adoption";
                addslashes($tableapplication_for_adoption);
                $resapplication_for_adoption = mysqli_query($link, $tableapplication_for_adoption) or die(mysqli_error($link));
                while($application_for_adoption = mysqli_fetch_object($resapplication_for_adoption))
                    {
                        echo "
                        <div class=\"table_div-main\">
                        <table class=\"table_boxx\">
                            <tr>
                            <td class=\"table_main-row table_id\">$application_for_adoption->id_application_for_adoption</td>
                            <td class=\"table_main-row\" width=\"19%\">$application_for_adoption->sending_date</td>
                            <td class=\"table_main-row\" width=\"20%\">$application_for_adoption->id_users</td>
                            <td class=\"table_main-row\" width=\"9%\">$application_for_adoption->id_application_status</td>
                            <td class=\"table_main-row\" width=\"15%\">$application_for_adoption->id_pets</td>
                            <td class=\"table_main-row\" style=\"
                            max-width: 70px;
                            width: 18%;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;\">$application_for_adoption->comment</td>
                            <td class=\"table_main-row table_action\">
                                <a href=\"?update=$application_for_adoption->id_application_for_adoption\"><img src=\"img/icons/icon_update.svg\" class=\"table_img\"></a>
                                <a href=\"?del=$application_for_adoption->id_application_for_adoption\"><img src=\"img/icons/icon_delete.svg\"></a>
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
                        <form action="php/admin/create_application_for_adoption.php" method="POST" class="create-table_form">
                            <label class="create-table_label">Дата отправки</label> 
                            <input type="date" name="sending_date" class="create-table_input">
                            <label class="create-table_label">Пользователь</label> 
                            <input type="number" name="id_users" class="create-table_input" min="1">
                            <label class="create-table_label">Статус заявки</label> 
                            <input type="number" name="id_application_status" class="create-table_input" min="1" max="3">
                            <label class="create-table_label">Животное</label> 
                            <input type="number" name="id_pets" class="create-table_input" min="1">
                            <label class="create-table_label">Комментарий</label> 
                            <textarea name="comment" class="create-table_input"></textarea>
                            <input type="submit" class="create-table_button" value="Добавить"/>
                        </form>
                        <a href="application_for_adoption.php" class="create-table_link">Назад</a>
                        <?php 
                        if (!empty($_SESSION['message'])) {
                            echo '<p class="error r">' . $_SESSION['message'] . '</p>';
                        }
                        unset ($_SESSION['message']); ?>
                    </div>
                <?php } ?>
                <?php 
                    if(isset($_GET['update'])) { 
                        $idD = $_GET['update'];
                        $queryy = "SELECT * FROM `application_for_adoption` WHERE `id_application_for_adoption`='$idD'";
                        addslashes($queryy);
                        $resqua = mysqli_query($link, $queryy) or die(mysqli_error($link));
                        $resj = mysqli_fetch_object($resqua);
                    ?>
                    <div class="create-table">
                        <h2 class="table_title-table create-table_title">Изменение записи</h2>
                        <form action="php/admin/update_application_for_adoption.php" method="POST" class="create-table_form">
                            <input type="hidden" name="id" value="<?php echo "".$resj->id_application_for_adoption. ""; ?>">
                            <label class="create-table_label">Дата отправки</label> 
                            <input type="date" name="sending_date" class="create-table_input" value="<?php echo "".$resj->sending_date. ""; ?>">
                            <label class="create-table_label">Пользователь</label> 
                            <input type="number" name="id_users" class="create-table_input" value="<?php echo "".$resj->id_users. ""; ?>">
                            <label class="create-table_label">Статус заявки</label> 
                            <input type="number" name="id_application_status" class="create-table_input" value="<?php echo "".$resj->id_application_status. ""; ?>">
                            <label class="create-table_label">Животное</label> 
                            <input type="number" name="id_pets" class="create-table_input" value="<?php echo "".$resj->id_pets. ""; ?>">
                            <label class="create-table_label">Комментарий</label> 
                            <textarea name="comment" class="create-table_input"><?php echo "".$resj->comment. ""; ?></textarea>
                            <input type="submit" name="izmenenie" class="create-table_button" value="Изменить"/>
                        </form>
                        <a href="application_for_adoption.php" class="create-table_link">Назад</a>
                        <?php 
                        if (!empty($_SESSION['message'])) {
                            echo '<p class="error r">' . $_SESSION['message'] . '</p>';
                        }
                        unset ($_SESSION['message']); ?>
                    </div>
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