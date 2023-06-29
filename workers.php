
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
                    <button class="section-admin_table-button"><span class="active_link">Сотрудники</span></button>
                    <button class="section-admin_table-button" onclick="location.href='medical_examination.php'">Медицинский осмотр</button>
                    <button class="section-admin_table-button" onclick="location.href='quarantine.php'">Карантин</button>
                    <button class="section-admin_table-button" onclick="location.href='application_for_adoption.php'">Заявка на усыновление</button>
                    <button class="section-admin_table-button" onclick="location.href='additional_photos_pets.php'">Дополнительные фото</button>
                </div>  
            </div>
            <div class="section-admin_results-table-box" id="result">
            <?php $sql = "SELECT * FROM employees LIMIT 1";
                addslashes($sql);
                $res = mysqli_query($link, $sql) or die(mysqli_error($link));
                while($qu = mysqli_fetch_object($res))
                    {
                echo "
                <div class=\"table_name-box\">
                <h2 class=\"table_title-table\">Сотрудники</h2>
                <a href=\"?create=$qu->id_employees\"><img src=\"img/icons/icon_insert.svg\"></a>
                </div>";
                    }
                    echo "
                <div class=\"table_div\">
                <table class=\"table_box\">
                    <tr class=\"table_row\">
                        <th class=\"table_name-row table_id\">id</th>
                        <th class=\"table_name-row\">Фамилия</th>
                        <th class=\"table_name-row\">Имя</th> 
                        <th class=\"table_name-row\">Отчество</th>
                        <th class=\"table_name-row\" width=\"20%\">Дата рождения</th>
                        <th class=\"table_name-row\">Пол</th>
                        <th class=\"table_name-row\">Действия</th>
                    </tr>
                </table>";
                if(isset($_GET['del'])) {
                    $id = $_GET['del'];
                    $query = "DELETE FROM employees WHERE id_employees=$id";
                    addslashes($query);
                    mysqli_query($link, $query) or die(mysqli_error($link));
                }
                $tableemployees = "SELECT * FROM employees";
                addslashes($tableemployees);
                $resquarantine = mysqli_query($link, $tableemployees) or die(mysqli_error($link));
                while($employees = mysqli_fetch_object($resquarantine))
                    {
                        echo "
                        <div class=\"table_div-main\">
                        <table class=\"table_boxx\">
                            <tr>
                            <td class=\"table_main-row table_id\">$employees->id_employees</td>
                            <td class=\"table_main-row\" width=\"17%\">$employees->surname</td>
                            <td class=\"table_main-row\" width=\"10%\">$employees->name</td>
                            <td class=\"table_main-row\" width=\"18%\">$employees->middle_name</td>
                            <td class=\"table_main-row\" width=\"20%\">$employees->date_of_birth</td>
                            <td class=\"table_main-row\" width=\"10%\">$employees->id_gender_human</td>
                            <td class=\"table_main-row table_action\">
                                <a href=\"?update=$employees->id_employees\"><img src=\"img/icons/icon_update.svg\" class=\"table_img\"></a>
                                <a href=\"?del=$employees->id_employees\"><img src=\"img/icons/icon_delete.svg\"></a>
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
                        <form action="php/admin/create_workers.php" method="POST" class="create-table_form">
                            <label class="create-table_label">Фамилия</label> 
                            <input type="text" name="surname" class="create-table_input">
                            <label class="create-table_label">Имя</label> 
                            <input type="text" name="name" class="create-table_input">
                            <label class="create-table_label">Отчество</label> 
                            <input type="text" name="middle_name" class="create-table_input">
                            <label class="create-table_label">Дата рождения</label> 
                            <input type="date" name="date_of_birth" class="create-table_input">
                            <label class="create-table_label">Пол</label> 
                            <input type="number" name="id_gender_human" class="create-table_input">
                            <input type="submit" class="create-table_button" value="Добавить"/>
                        </form>
                        <a href="workers.php" class="create-table_link">Назад</a>
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
                        $queryy = "SELECT * FROM `employees` WHERE `id_employees`='$idD'";
                        addslashes($queryy);
                        $resqua = mysqli_query($link, $queryy) or die(mysqli_error($link));
                        $resj = mysqli_fetch_object($resqua);
                    ?>
                    <div class="create-table">
                        <h2 class="table_title-table create-table_title">Изменение записи</h2>
                        <form action="php/admin/update_workers.php" method="POST" class="create-table_form">
                            <input type="hidden" name="id" value="<?php echo "".$resj->id_employees. ""; ?>">
                            <label class="create-table_label">Фамилия</label> 
                            <input type="text" name="surname" class="create-table_input" value="<?php echo "".$resj->surname. ""; ?>">
                            <label class="create-table_label">Имя</label> 
                            <input type="text" name="name" class="create-table_input" value="<?php echo "".$resj->name. ""; ?>">
                            <label class="create-table_label">Отчество</label> 
                            <input type="text" name="middle_name" class="create-table_input" value="<?php echo "".$resj->middle_name. ""; ?>">
                            <label class="create-table_label">Дата рождения</label> 
                            <input type="date" name="date_of_birth" class="create-table_input" value="<?php echo "".$resj->date_of_birth. ""; ?>">
                            <label class="create-table_label">Пол</label> 
                            <input type="number" name="id_gender_human" class="create-table_input" value="<?php echo "".$resj->id_gender_human. ""; ?>">
                            <input type="submit" name="izmenenie" class="create-table_button" value="Изменить"/>
                        </form>
                        <a href="workers.php" class="create-table_link">Назад</a>
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