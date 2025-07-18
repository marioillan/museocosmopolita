document.addEventListener("DOMContentLoaded", function() {
    var formularioSesion = document.forms["formularioLogin"];
    formularioSesion.addEventListener("submit", function(event) {
        var usuario = document.getElementById("usuario").value.trim();
        var contrasenia = document.getElementById("contrasenia").value.trim();
        var mensajes = "";
        var valid = true;

        if (usuario === "") {
            mensajes += "Introduzca el usuario<br>";
            valid = false;
        }
        if (contrasenia === "") {
            mensajes += "Introduzca la contraseña<br>";
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            document.getElementById("mensaje_error").innerHTML = mensajes;
        }
    });
});
