const menuBar = document.getElementById('menuBar');
const navBar = document.getElementById('navBar');
const xRegular = document.getElementById('xRegular');
const faqs = document.querySelectorAll(".faq");

menuBar.addEventListener("click", function () {
    navBar.classList.toggle('active');
    xRegular.classList.toggle('active');
    menuBar.classList.toggle('active');
});

xRegular.addEventListener("click", function() {
    navBar.classList.toggle('active');
    xRegular.classList.toggle('active');
    menuBar.classList.toggle('active');
})

faqs.forEach(faq => {
    faq.addEventListener("click", () => {
        faq.classList.toggle("active");
    })
})