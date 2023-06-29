const faqs = document.querySelectorAll(".section-faq_faq-box"); //объявление переменной

faqs.forEach((faq) => { //создание цикла foreach к элементу faq
    faq.addEventListener("click", () => { //событие внутри срабатывает при нажатии на кнопку
        faq.classList.toggle("active"); //метод classList.toggle добавляет к элементу faq класс active, если он уже есть, то удаляет данный класс
    });
});