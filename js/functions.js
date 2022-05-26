function mostrarNoticiasId(id) {
    $.ajax({
        url: "/php/ObtenerNoticiasId.php",
        type: "POST",
        async: true,
        data: {
            idNoticia: id,
        },
        success: function (response) {
            var objNoticia = JSON.parse(response);
            var noticiaHtml = `<tr>
                                        <td scope="row">${objNoticia[0]}</td>
                                        <td>${objNoticia[1]}</td>
                                        <td>${objNoticia[2]}</td>
                                        <td>${objNoticia[3]}</td>
                                        <td>${objNoticia[4]}</td>
                                        <td>${objNoticia[5]}</td>
                                        <td>${objNoticia[6]}</td>
                                        <td><button type="button" class="btn btn-info">Editar</button></td>
                                        <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                                    </tr>`;
            $("#rowsContact").html(noticiaHtml);
        },
    });
}

function mostrarNoticias() {
    $.ajax({
        url: "/php/ObtenerNoticias.php",
        async: true,
        success: function (response) {
            console.log(response);
            var noticias = JSON.parse(response);
            noticias.forEach((element) => {
                var noticiaHtml = `<tr>
                                        <td scope="row">${element._id}</td>
                                        <td>${element.titulo}</td>
                                        <td>${element.descripcion}</td>
                                        <td>${element.encabezado}</td>
                                        <td>${element.usuario}</td>
                                        <td>${element.fechaPublicacion}</td>
                                        <td>${element.etiquetas}</td>
                                        <td><button id="btnEditar" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditar">Editar</button></td>
                                        <td><button id="btnEliminar" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar">Eliminar</button></td>
                                        </tr>`;
                $("#rowsContact").append(noticiaHtml);
            });
        },
    });
}

function guardarNoticia() {
    var titulo = $("#inputTitulo").val();
    var descripcion = $("#inputDescripcion").val();
    var encabezado = $("#inputEncabezado").val();
    var idUsuario = $("#inputIdUsuario").val();
    var fecha = $("#inputFechaPublicacion").val();
    var idEtiqueta = $("#inputIdEtiqueta").val();
    $.ajax({
        url: "/php/RegistrarNoticia.php",
        type: "POST",
        async: true,
        data: {
            titulo: titulo,
            descripcion: descripcion,
            encabezado: encabezado,
            idUsuario: idUsuario,
            fechaPublicacion: fecha,
            idEtiqueta: idEtiqueta,
        },
        success: function (response) {
            var obj = response;
            console.log(obj);
            $("#modalIngresarNoticia").modal("hide");
            $("#tblContact > tbody").empty();
            mostrarNoticias();
        },
    });
}

function mostrarInformacionNoticia(id) {
    $.ajax({
        url: "/php/ObtenerNoticiasId.php",
        type: "POST",
        async: true,
        data: {
            idNoticia: id,
        },
        success: function (response) {
            var objNoticia = JSON.parse(response);
            $("#inputIdNoticiaEditar").val(objNoticia[0]);
            $("#inputTituloEditar").val(objNoticia[1]);
            $("#inputDescripcionEditar").val(objNoticia[2]);
            $("#inputEncabezadoEditar").val(objNoticia[3]);
            $("#inputIdUsuarioEditar").val(objNoticia[4]);
            $("#inputFechaPublicacionEditar").val(objNoticia[5]);
            $("#inputIdEtiquetaEditar").val(objNoticia[6]);
        },
    });
}

function editarNoticia() {
    var idNoticia = $("#inputIdNoticiaEditar").val();
    var titulo = $("#inputTituloEditar").val();
    var descripcion = $("#inputDescripcionEditar").val();
    var encabezado = $("#inputEncabezadoEditar").val();
    var idUsuario = $("#inputIdUsuarioEditar").val();
    var fecha = $("#inputFechaPublicacionEditar").val();
    var idEtiqueta = $("#inputIdEtiquetaEditar").val();
    $.ajax({
        url: "/php/EditarNoticia.php",
        type: "POST",
        async: true,
        data: {
            idNoticia: idNoticia,
            titulo: titulo,
            descripcion: descripcion,
            encabezado: encabezado,
            idUsuario: idUsuario,
            fechaPublicacion: fecha,
            idEtiqueta: idEtiqueta,
        },
        success: function (response) {
            $("#modalEditar").modal("hide");
            $("#tblContact > tbody").empty();
            mostrarNoticias();
        },
    });
    
}

function escucharBotonEditar() {
    $("#rowsContact").on("click", "#btnEditar", function (e) {
        e.preventDefault(); // cancela el evento por defecto ***MUY IMPORTANTE PARA EL FUNCIONAMIENTO**
        var filaActual = $(this).closest("tr"); // obtiene la fila actual
        var id = filaActual.find("td:eq(0)").text(); // obtiene el valor del primer TD de la fila actual
        mostrarInformacionNoticia(id);
    });
}

function escucharBotonEliminar() {
    $("#rowsContact").on("click", "#btnEliminar", function (e) {
        e.preventDefault(); // cancela el evento por defecto ***MUY IMPORTANTE PARA EL FUNCIONAMIENTO**
        var filaActual = $(this).closest("tr"); // obtiene la fila actual
        var id = filaActual.find("td:eq(0)").text(); // obtiene el valor del primer TD de la fila actual
        eliminarNoticia(id);
    });
}

function eliminarNoticia(id) {
    $("#modalEliminar").on("click", "#btnModalEliminar", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/php/EliminarNoticia.php",
            type: "POST",
            async: true,
            data: {
                idNoticia: id,
            },
            success: function (response) {
                $("#modalEliminar").modal("hide");
                $("#tblContact > tbody").empty();
                mostrarNoticias();
            },
        });
    });
}

$(document).ready(function () {
    mostrarNoticias();
    $("#btnSearch").click(function () {
        var id = $("#txtSearch").val();
        mostrarNoticiasId(id);
    });
    escucharBotonEditar();
    escucharBotonEliminar();
});
