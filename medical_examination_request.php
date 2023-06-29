<?php
session_start();
require_once 'php/config/connect.php';
?>

<div class="section-miracle-paws_katalog-pets">
<h2 class="volunteers-box_title">Животные, которым требуется медицинское лечение:</h2>
<?php 
$result = mysqli_query($link, "SELECT pets.id_pets, pets.name as name_pet, pets.age, pets.photo_pets, pets.gender_pets, medical_examination.*, diagnosis.*
FROM medical_examination 
LEFT JOIN pets 
ON medical_examination.id_pets= pets.id_pets 
JOIN diagnosis 
ON medical_examination.id_diagnosis = diagnosis.id_diagnosis 
WHERE diagnosis.id_diagnosis = '2';");    

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