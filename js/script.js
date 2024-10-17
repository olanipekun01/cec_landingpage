const menuBar = document.getElementById('menuBar');
const navBar = document.getElementById('navBar');
const xRegular = document.getElementById('xRegular');

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