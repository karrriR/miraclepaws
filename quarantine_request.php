<?php
session_start();
require_once 'php/config/connect.php';
?>
<h2 class="volunteers-box_title">Животные, которые находятся на карантине:</h2>
<div class="section-miracle-paws_katalog-pets">
<?php 
$result = mysqli_query($link, "SELECT pets.id_pets, pets.name as name_pet, pets.age, pets.photo_pets, pets.gender_pets, quarantine.* FROM quarantine LEFT JOIN pets ON quarantine.id_pets= pets.id_pets WHERE quarantine.release_date > NOW();");    

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
    <a href="card_pets.php" class="section-miracle-paws_slide-link">
        <img src="img/pets/<?= $pets['photo_pets']; ?>" alt="foto pet" class="section-miracle-paws_image">
        <div class="section-miracle-paws_description-box">
            <h3 class="section-miracle-paws_name"><?= $pets['name_pet']; ?></h3>
            <p class="section-miracle-paws_description"><?= $age; ?> <?= $suffix ?>, <?= $pets['gender_pets']; ?></p>
        </div>
    </a>
</div>
<?php 
}
?></div>