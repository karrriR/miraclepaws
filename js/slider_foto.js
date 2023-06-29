//объявление переменных
let offest = 0; 
const sliderLine = document.querySelector('.section-card-pets_slider-line');

function slideNext() { //функция при нажатии на кнопку
    offest = offest +=565; //увеличение значения переменной на 565
    if(offest > 1130){ //условие для значения переменной
        offest = 0; //значение переменной при выполнении условия
    }
    sliderLine.style.left = -offest + 'px'; // присваивание к значению left в стилях класса .section-card-pets_slider-line значение из переменной -offest
    
}
function slidePrew() { //функция при нажатии на кнопку
    offest = offest -=565; //уменьшение значения переменной на 565
    if(offest < 0){ //условие для значения переменной
        offest = 1130; //значение переменной при выполнении условия
    }
    sliderLine.style.left = -offest + 'px'; // присваивание к значению left в стилях класса .section-card-pets_slider-line значение из переменной -offest
}
