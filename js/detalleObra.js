window.onload = function() {
    var imagenes = document.querySelectorAll('.obra img');
    var detalleObra = document.createElement('div');
    detalleObra.className = 'detalleObra';
    document.body.appendChild(detalleObra);

    imagenes.forEach(function(img) {
        img.onmouseover = function(e) {
            var titulo = img.getAttribute('titulo');
            var tematica = img.getAttribute('tematica');
            detalleObra.innerHTML = '<strong>' + titulo + '</strong><br>' + tematica;
            detalleObra.style.display = 'block';
        };

        img.onmousemove = function(e) {
            detalleObra.style.top = e.pageY + 15 + 'px';
            detalleObra.style.left = e.pageX + 15 + 'px';
        };

        img.onmouseout = function() {
            detalleObra.style.display = 'none';
        };
    });

};