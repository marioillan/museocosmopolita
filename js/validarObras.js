document.addEventListener("DOMContentLoaded", () => {
    const formulario = document.querySelector("form[name='formularioObras']");
    const titulo = document.getElementById("titulo");
    const imagen = document.getElementById("imagen");
    const tematica = document.getElementById("tematica");
    const autor = document.getElementById("autor");
    const epoca = document.getElementById("epoca");
    const errorDiv = document.getElementById("mensaje_error_obras");
    const preview = document.getElementById("preview_imagen");

    if (!formulario) return;

    formulario.addEventListener("submit", (e) => {
        let errores = [];

        if (titulo.value.trim() === "") errores.push("El título es obligatorio.");
        if (tematica.value.trim() === "") errores.push("La temática es obligatoria.");
        if (autor.value.trim() === "") errores.push("El autor es obligatorio.");
        if (epoca.value.trim() === "") errores.push("La época es obligatoria.");
        if (!imagen.value && !imagen.dataset.existing) errores.push("Debes subir una imagen.");

        if (errores.length > 0) {
            e.preventDefault();
            errorDiv.innerHTML = errores.map(e => `<p>${e}</p>`).join("");
            errorDiv.style.display = "block";
        } else {
            errorDiv.style.display = "none";
        }
    });

    imagen.addEventListener("change", () => {
        const file = imagen.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    });
});