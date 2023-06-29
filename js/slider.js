//объявление переменных
let offest = 0; 

const sliderLine = document.querySelector('.section-three_wrapper');
const cont = document.querySelector('.section-three_container');
const butL = document.querySelector('.section-three_button-l');
const butR = document.querySelector('.section-three_button-r');

//функция пролистывания слайдера вперед
function slideRight() {
    offest = offest +=290;
    if(offest > 1450){
        offest = 1450;
        butR.style.opacity = '0.6'; 
    }

    sliderLine.style.left = -offest + 'px';
    butL.style.opacity = '1'; 
    
}
//функция пролистывания слайдера назад
function slideLeft() {
    offest = offest -=290;
    if(offest < 0){
        offest = 0;
        butL.style.opacity = '0.6';
    }
    sliderLine.style.left = -offest + 'px';
    butR.style.opacity = '1';
}

