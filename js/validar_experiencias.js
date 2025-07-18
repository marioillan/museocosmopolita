document.addEventListener("DOMContentLoaded", function() {
    var formularioExperiencias = document.forms["formularioExperiencias"];
    formularioExperiencias.addEventListener("submit", function(event) {
        var comentario = document.getElementById("comentario").value.trim();
        var mensajes = "";
        var valid = true;

        if (comentario === "") {
            mensajes += "El campo comentario es obligatorio.<br>";
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            document.getElementById("mensaje_error_experiencias").innerHTML = mensajes;
        } else {
            document.getElementById("mensaje_error_experiencias").innerHTML = "";
        }
    });
});
