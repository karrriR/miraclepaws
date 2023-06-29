
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
                    <button class="section-admin_table-button"><span class="active_link">Животные</span></button>
                    <button class="section-admin_table-button" onclick="location.href='users.php'">Пользователи</button>
                    <button class="section-admin_table-button" onclick="location.href='workers.php'">Сотрудники</button>
                    <button class="section-admin_table-button" onclick="location.href='medical_examination.php'">Медицинский осмотр</button>
                    <button class="section-admin_table-button" onclick="location.href='quarantine.php'">Карантин</button>
                    <button class="section-admin_table-button" onclick="location.href='application_for_adoption.php'">Заявка на усыновление</button>
                    <button class="section-admin_table-button" onclick="location.href='additional_photos_pets.php'">Дополнительные фото</button>
                </div>  
            </div>
            <div class="section-admin_results-table-box" id="result">
            <?php $sql = "SELECT * FROM pets LIMIT 1";
                addslashes($sql);
                $res = mysqli_query($link, $sql) or die(mysqli_error($link));
                while($qu = mysqli_fetch_object($res))
                    {
                echo "
                <div class=\"table_name-box table-name-box-two\">
                <h2 class=\"table_title-table\">Животные</h2>
                <a href=\"?create=$qu->id_pets\"><img src=\"img/icons/icon_insert.svg\"></a>
                </div>";
                    }
                    echo "
                <div class=\"table_div table-div-two\">
                <div class=\"table_box table-div-two\">
                    <div class=\"table_row\" style=\"
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                \">
                        <p class=\"table_name-row\">id</p>
                        <p class=\"table_name-row\">Имя</p>
                        <p class=\"table_name-row\">Возраст</p> 
                        <p class=\"table_name-row\">Вес</p>
                        <p class=\"table_name-row\">Рост</p>
                        <p class=\"table_name-row\">Шерсть</p>
                        <p class=\"table_name-row\">Окрас</p>
                        <p class=\"table_name-row\">История</p>
                        <p class=\"table_name-row\">Фото</p>
                        <p class=\"table_name-row\">Родство</p>
                        <p class=\"table_name-row\">Усыновлен</p>
                        <p class=\"table_name-row\" >От</p>
                        <p class=\"table_name-row\">До</p>
                        <p class=\"table_name-row\">Тип</p>
                        <p class=\"table_name-row\">Пол</p>
                        <p class=\"table_name-row\">Доп фото</p>
                        <p class=\"table_name-row\">Действия</p>
                    </div>
                </div>";
                if(isset($_GET['del'])) {
                    $id = $_GET['del'];
                    $query = "DELETE FROM pets WHERE id_pets=$id";
                    addslashes($query);
                    mysqli_query($link, $query) or die(mysqli_error($link));
                }
                $tablepets = "SELECT * FROM pets";
                addslashes($tablepets);
                $resusers = mysqli_query($link, $tablepets) or die(mysqli_error($link));
                while($pets = mysqli_fetch_object($resusers))
                    {
                        echo "
                        <div class=\"table_div-main\">
                        <table class=\"table_boxx table-main-box-two\">
                            <tr>
                            <td class=\"table_main-row\" width=\"2%\">$pets->id_pets</td>
                            <td class=\"table_main-row\" style=\"
                            width: 5.4%;\">$pets->name</td>
                            <td class=\"table_main-row\" style=\"
                            width: 4.4%;\">$pets->age</td>
                            <td class=\"table_main-row\" width=\"5%\">$pets->weight</td>
                            <td class=\"table_main-row\" width=\"2.6%\">$pets->height</td>
                            <td class=\"table_main-row\" width=\"7%\">$pets->wool</td>
                            <td class=\"table_main-row\" style=\" width: 5.75%;\">$pets->color</td>
                            <td class=\"table_main-row\" style=\"
                            max-width: 50px;
                            width: 6.75%;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;\">$pets->history</td>
                            <td class=\"table_main-row\" style=\"
                            max-width: 70px;
                            width: 3.85%;
                            \"><img src=\"img/pets/$pets->photo_pets\" style=\"
                            width: 40px;
                            height: 40px
                            \"></td>
                            <td class=\"table_main-row\" width=\"6%\">$pets->kinship</td>
                            <td class=\"table_main-row\" width=\"4%\">$pets->adopted</td>
                            <td class=\"table_main-row\" width=\"5%\">$pets->arrival_date</td>
                            <td class=\"table_main-row\" width=\"5%\">$pets->limit_expiration_date</td>
                            <td class=\"table_main-row\" width=\"4%\">$pets->type_pets</td>
                            <td class=\"table_main-row\" width=\"4%\">$pets->gender_pets</td>
                            <td class=\"table_main-row\" width=\"5%\">$pets->additional_photos</td>
                            <td class=\"table_main-row table_action\" width=\"8%\">
                                <a href=\"?update=$pets->id_pets\"><img src=\"img/icons/icon_update.svg\" class=\"table_img\"></a>
                                <a href=\"?del=$pets->id_pets\"><img src=\"img/icons/icon_delete.svg\"></a>
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
                        <form enctype="multipart/form-data" action="php/admin/create_pets.php" method="POST" class="create-table_form">
                            <label class="create-table_label">Имя</label> 
                            <input type="text" name="name" class="create-table_input">
                            <label class="create-table_label">Возраст</label> 
                            <input type="number" name="age" class="create-table_input">
                            <label class="create-table_label">Вес</label> 
                            <input type="number" name="weight" class="create-table_input">
                            <label class="create-table_label">Рост</label> 
                            <input type="number" name="height" class="create-table_input">
                            <label class="create-table_label">Шерсть</label> 
                            <input type="text" name="wool" class="create-table_input">
                            <label class="create-table_label">Окрас</label> 
                            <input type="text" name="color" class="create-table_input">
                            <label class="create-table_label">История</label> 
                            <textarea name="history" class="create-table_input"></textarea>
                            <label class="create-table_label">Фото животного</label> 
                            <input type="file" name="img" />
                            <label class="create-table_label">Родство</label> 
                            <input type="text" name="kinship" class="create-table_input">
                            <label class="create-table_label">Усыновлен</label> 
                            <input type="text" name="adopted" class="create-table_input">
                            <label class="create-table_label">Дата прибытия</label> 
                            <input type="date" name="arrival_date" class="create-table_input">
                            <label class="create-table_label">Дата окончания лимита</label> 
                            <input type="date" name="limit_expiration_date" class="create-table_input">
                            <label class="create-table_label">Тип животного</label> 
                            <input type="text" name="type_pets" class="create-table_input">
                            <label class="create-table_label">Пол животного</label> 
                            <input type="text" name="gender_pets" class="create-table_input">
                            <label class="create-table_label">Дополнительные фотографии</label> 
                            <input type="text" name="additional_photos" class="create-table_input">
                            <input type="submit" name="dov" class="create-table_button" value="Добавить"/>
                        </form>
                        <a href="pets.php" class="create-table_link">Назад</a>
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
                        $queryy = "SELECT * FROM `pets` WHERE `id_pets`='$idD'";
                        addslashes($queryy);
                        $resqua = mysqli_query($link, $queryy) or die(mysqli_error($link));
                        $resj = mysqli_fetch_object($resqua);
                    ?>
                    <div class="create-table">
                        <h2 class="table_title-table create-table_title">Изменение записи</h2>
                        <form enctype="multipart/form-data" action="php/admin/update_pets.php" method="POST" class="create-table_form">
                            <input type="hidden" name="id" value="<?php echo "".$resj->id_pets. ""; ?>">
                            <label class="create-table_label">Имя</label> 
                            <input type="text" name="name" class="create-table_input" value="<?php echo "".$resj->name. ""; ?>">
                            <label class="create-table_label">Возраст</label> 
                            <input type="number" name="age" class="create-table_input" value="<?php echo "".$resj->age. ""; ?>">
                            <label class="create-table_label">Вес</label> 
                            <input type="number" name="weight" class="create-table_input" value="<?php echo "".$resj->weight. ""; ?>">
                            <label class="create-table_label">Рост</label> 
                            <input type="number" name="height" class="create-table_input" value="<?php echo "".$resj->height. ""; ?>">
                            <label class="create-table_label">Шерсть</label> 
                            <input type="text" name="wool" class="create-table_input" value="<?php echo "".$resj->wool. ""; ?>">
                            <label class="create-table_label">Окрас</label> 
                            <input type="text" name="color" class="create-table_input" value="<?php echo "".$resj->color. ""; ?>">
                            <label class="create-table_label">История</label> 
                            <textarea name="history" class="create-table_input"><?php echo "".$resj->history. ""; ?></textarea>
                            <label class="create-table_label">Фото животного</label> 
                            <input type="text" name="foto" class="create-table_input fot" value="<?php echo "".$resj->photo_pets. ""; ?>">
                            <input type="file" name="img" />
                            <label class="create-table_label">Родство</label> 
                            <input type="text" name="kinship" class="create-table_input" value="<?php echo "".$resj->kinship. ""; ?>">
                            <label class="create-table_label">Усыновлен</label> 
                            <input type="text" name="adopted" class="create-table_input" value="<?php echo "".$resj->adopted. ""; ?>">
                            <label class="create-table_label">Дата прибытия</label> 
                            <input type="date" name="arrival_date" class="create-table_input" value="<?php echo "".$resj->arrival_date. ""; ?>">
                            <label class="create-table_label">Дата окончания лимита</label> 
                            <input type="date" name="limit_expiration_date" class="create-table_input" value="<?php echo "".$resj->limit_expiration_date. ""; ?>">
                            <label class="create-table_label">Тип животного</label> 
                            <input type="text" name="type_pets" class="create-table_input" value="<?php echo "".$resj->type_pets. ""; ?>">
                            <label class="create-table_label">Пол животного</label> 
                            <input type="text" name="gender_pets" class="create-table_input" value="<?php echo "".$resj->gender_pets. ""; ?>">
                            <label class="create-table_label">Дополнительные фотографии</label> 
                            <input type="text" name="additional_photos" class="create-table_input" value="<?php echo "".$resj->additional_photos. ""; ?>">
                            <input type="submit" name="izmenenie" class="create-table_button" value="Изменить"/>
                        </form>
                        <a href="pets.php" class="create-table_link">Назад</a>
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