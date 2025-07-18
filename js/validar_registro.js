document.addEventListener("DOMContentLoaded", function() {
    var formularioRegistro = document.forms["formularioRegistro"];
    formularioRegistro.addEventListener("submit", function(event) {
        var nombre = document.getElementById("nombre").value.trim();
        var apellidos = document.getElementById("input-apellidos").value.trim();
        var usuario = document.getElementById("input-usuario").value.trim();
        var correo = document.getElementById("input-correo").value.trim();
        var contrasenia = document.getElementById("input-contrasenia").value.trim();
        var fecha_nacimiento = document.getElementById("input-nacimiento").value.trim();
        var telefono = document.getElementById("input-telefono").value.trim();
        var mensajes = "";
        var valid = true;

        if (nombre === "") {
            mensajes += "El campo nombre es obligatorio.<br>";
            valid = false;
        }
        if (apellidos === "") {
            mensajes += "El campo apellidos es obligatorio.<br>";
            valid = false;
        }
        if (usuario === "") {
            mensajes += "El campo usuario es obligatorio.<br>";
            valid = false;
        }
        if (correo === "") {
            mensajes += "El campo correo es obligatorio.<br>";
            valid = false;
        }
        if (contrasenia === "") {
            mensajes += "El campo contraseña es obligatorio.<br>";
            valid = false;
        }

        if (fecha_nacimiento === "") {
            mensajes += "El campo fecha de nacimiento es obligatorio.<br>";
            valid = false;
        }else {
            var fecha_nacimiento_date = new Date(fecha_nacimiento);
            var fecha_actual = new Date();
            if (fecha_nacimiento_date > fecha_actual || fecha_nacimiento_date.getFullYear() < 1900) {
                mensajes += "La fecha de nacimiento no es válida.<br>";
                valid = false;
            }
        }
        
        if (telefono === "") {
            mensajes += "El campo teléfono es obligatorio.<br>";
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            document.getElementById("mensaje_error_registro").innerHTML = mensajes;
        } else {
            document.getElementById("mensaje_error_registro").innerHTML = "";
        }
    });
});
