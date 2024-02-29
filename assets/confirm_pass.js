const txtContraseña = document.getElementById("txtContraseña");
let txtConfirmPass = document.getElementById("txtConfirmPass");
let btnRegistrarse = document.getElementById("btnRegistrarse");
let lblError = document.getElementById("lblError");

const ValidarContraseña = (confirmPass, Pass) => {
    if (confirmPass != Pass) {
        lblError.innerText = "Las contraseñas NO coinciden.";
        txtConfirmPass.classList.remove("border-dark")
        txtConfirmPass.classList.add("border-danger", "border-2");
        btnRegistrarse.disabled = true;
    } else {
        lblError.innerText = "";
        txtConfirmPass.classList.remove("border-danger", "border-2")
        txtConfirmPass.classList.add("border-dark");
        btnRegistrarse.disabled = false;
    }
}

txtConfirmPass.addEventListener("focus", () => {
    txtContraseña.addEventListener("input", (ev) => {
        ValidarContraseña(ev.target.value, txtConfirmPass.value);
    });
})
txtConfirmPass.addEventListener("input", (ev) => {
    ValidarContraseña(ev.target.value, txtContraseña.value);
});