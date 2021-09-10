function buscar_ahora(buscar) {
    var parametros = { "buscar": buscar };
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'buscador.php',
        success: function (data) {
            document.getElementById("datos_buscador").innerHTML = data;
        }
    });
}