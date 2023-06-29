//объявление переменных
var blockHidden = document.querySelector('.form-registr_block'); 
var blockHiddenTwo = document.querySelector('.form-authorization_block'); 
var blockHiddenThree = document.querySelector('.form-adoption_block'); 
var blockHiddenFour = document.querySelector('.form-volunteering_block'); 

function registr_button() { //функция при нажатии на кнопку
    blockHidden.classList.add('b-show'); //добавление к переменной класса
}
function closeRegistr() { //функция при нажатии на кнопку
    blockHidden.classList.remove('b-show'); //удаление класса у переменной
}
function openAutoriz() { //функция при нажатии на кнопку
    blockHiddenTwo.classList.add('b-show-two'); //добавление к переменной класса
    blockHidden.classList.remove('b-show'); //удаление класса у переменной
}
function closeAuthorization() { //функция при нажатии на кнопку
    blockHiddenTwo.classList.remove('b-show-two'); //удаление класса у переменной
}
function openRegistr() { //функция при нажатии на кнопку
    blockHidden.classList.add('b-show'); //добавление к переменной класса
    blockHiddenTwo.classList.remove('b-show-two'); //удаление класса у переменной
}
function openAdoption() { //функция при нажатии на кнопку
    blockHiddenThree.classList.add('b-show-three'); //добавление к переменной класса
}
function closeAdoption() { //функция при нажатии на кнопку
    blockHiddenThree.classList.remove('b-show-three'); //удаление класса у переменной
}
function openVolunteering() { //функция при нажатии на кнопку
    blockHiddenFour.classList.add('b-show-four'); //добавление к переменной класса
}
function closeVolunteering() { //функция при нажатии на кнопку
    blockHiddenFour.classList.remove('b-show-four'); //удаление класса у переменной
}