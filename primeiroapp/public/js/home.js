const btnRegistro = document.querySelector(".btn-registro");
const login = document.querySelector(".login");
const registro = document.querySelector(".registro");

btnRegistro.addEventListener("click", () => {
    login.style.display = "none";
    registro.style.display = "block";
});

const btnLogin = document.querySelector(".btn-login");

btnLogin.addEventListener("click", () => {
    login.style.display = "block";
    registro.style.display = "none";
});

