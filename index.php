<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Contactos</title>
</head>

<body>
    <section class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand">Lista de noticias</a>
                    <div class="form-inline">
                        <input id="txtSearch" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button id="btnSearch" class="btn btn-outline-success my-2 my-sm-0" type="button">Buscar</button>
                    </div>
                </nav>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col col-md-12">
                <button id="btnNuevaNoticia" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalIngresarNoticia">Ingresar Noticia</button>
                <div>
                    <table id="tblContact" class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="table-success">#</th>
                                <th scope="col" class="table-success">Titulo</th>
                                <th scope="col" class="table-success">Descripción</th>
                                <th scope="col" class="table-success">Encabezado</th>
                                <th scope="col" class="table-success">Usuario</th>
                                <th scope="col" class="table-success">Fecha</th>
                                <th scope="col" class="table-success">Etiqueta</th>
                                <th scope="col" class="table-success">Editar</th>
                                <th scope="col" class="table-success">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="rowsContact">
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="modals">
        <!-- Modal Editar -->
        <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar noticia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="titulo-id-noticia">ID de la noticia</label>
                                <input readonly="true" type="text" class="form-control" id="inputIdNoticiaEditar" placeholder="Titulo">
                            </div>
                            <div class="form-group">
                                <label for="titulo-noticia">Titulo de la noticia</label>
                                <input type="text" class="form-control" id="inputTituloEditar" placeholder="Titulo">
                            </div>
                            <div class="form-group">
                                <label for="titulo-descripcion">Descripción de la noticia</label>
                                <input type="text" class="form-control" id="inputDescripcionEditar" placeholder="Descripción de la noticia">
                            </div>
                            <div class="form-group">
                                <label for="titulo-encabezado">Encabezado de la noticia</label>
                                <input type="text" class="form-control" id="inputEncabezadoEditar" placeholder="Encabezado de la noticia">
                            </div>
                            <div class="form-group">
                                <label for="titulo-usuario">Usuario</label>
                                <input type="text" class="form-control" id="inputIdUsuarioEditar" placeholder="Usuario">
                            </div>
                            <div class="form-group">
                                <label for="titulo-fecha-publicacion">Fecha de publicación</label>
                                <input type="text" class="form-control" id="inputFechaPublicacionEditar" placeholder="Encabezado de la noticia">
                            </div>
                            <div class="form-group">
                                <label for="titulo-etiqueta">Usuario</label>
                                <input type="text" class="form-control" id="inputIdEtiquetaEditar" placeholder="Etiquetas">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" onClick="editarNoticia()" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Eliminar -->
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar noticia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar la noticia?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button id="btnModalEliminar" onClick="" type="button" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ingresar -->
        <div class="modal fade" id="modalIngresarNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingresar noticia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="titulo-noticia">Titulo de la noticia</label>
                                <input type="text" class="form-control" id="inputTitulo" placeholder="Titulo">
                            </div>
                            <div class="form-group">
                                <label for="titulo-descripcion">Descripción de la noticia</label>
                                <input type="text" class="form-control" id="inputDescripcion" placeholder="Descripción de la noticia">
                            </div>
                            <div class="form-group">
                                <label for="titulo-encabezado">Encabezado de la noticia</label>
                                <input type="text" class="form-control" id="inputEncabezado" placeholder="Encabezado de la noticia">
                            </div>
                            <div class="form-group">
                                <label for="titulo-id-usuario">Usuario</label>
                                <input type="text" class="form-control" id="inputIdUsuario" placeholder="ID del usuario">
                            </div>
                            <div class="form-group">
                                <label for="titulo-fecha-publicacion">Fecha de publicación</label>
                                <input type="text" class="form-control" id="inputFechaPublicacion" placeholder="Encabezado de la noticia">
                            </div>
                            <div class="form-group">
                                <label for="titulo-id-etiqueta">Etiquetas</label>
                                <input type="text" class="form-control" id="inputIdEtiqueta" placeholder="ID de la etiqueta">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button id="btnGuardarNoticia" onClick="guardarNoticia()" type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/functions.js"></script>
</body>

</html>