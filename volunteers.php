<?php
session_start();
require_once 'php/config/connect.php';
$sql = "SELECT users.*, access_rights.name as access_name FROM users INNER JOIN access_rights ON users.id_access_rights = access_rights.id_access_rights WHERE users.id_access_rights = '3';";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
?>
<div class="volunteers-box_box">
    <h2 class="volunteers-box_title">Волонтеры, которы работают в приюте:</h2>
    <div class="volunteers-box_box-v">
<?php while($users = mysqli_fetch_assoc($result)) { ?>
    <div class="volunteers-box_boxx">
        <div class="volunteers-box_boxxx">
            <img src="php/admin/img/<?= $users['photo_profile']; ?>" alt="foto" class="volunteers-box_img">
            <p class="volunteers-box_text"><?= $users['name']; ?></p>
            <p class="volunteers-box_text"><?= $users['surname']; ?></p>
            <p class="volunteers-box_text"><?= $users['email']; ?></p>
            <p class="volunteers-box_text"><?= $users['telephone']; ?></p>
            <p class="volunteers-box_text"><?= $users['access_name']; ?></p>
        </div>
    </div>
<?php } ?>
</div>
</div>