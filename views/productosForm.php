<?php

include_once "header.php";
//* body
?>
<form id="productosForm">
    <div class="row">
        <h2 class="text-center bg-dark text-white">Productos</h2>
    </div>

    <div class="row justify-content-center my-1">
        <div class="col-6">
            <form>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="example">
                    <label for="name">Nombre Del Producto:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="precio" id="precio" placeholder="example">
                    <label for="precio">Precio Del Producto:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="example">
                    <label for="cantidad">Cantidad Del Producto:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="example">
                    <label for="descripcion">Descripcion Del Producto:</label>
                </div>
                <button type="button" class="btn btn-primary" onclick="created()">Agregar</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <h2 class="text-center bg-dark text-white">Datos De Productos</h2>
        <div class="col-8">
            <table class="table table-dark" id="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha De Creacion</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</form>

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Cambiar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-update">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nameUpdate" id="nameUpdate"
                        placeholder="@example">
                    <label for="nameUpdate">Nombre Del Producto:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="precioUpdate" id="precioUpdate"
                        placeholder="@example">
                    <label for="precioUpdate">Precio Del Producto:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="cantidadUpdate" id="cantidadUpdate"
                        placeholder="@example">
                    <label for="cantidadUpdate">Cantidad Del Producto:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="descripcionUpdate" id="descripcionUpdate"
                        placeholder="@example">
                    <label for="descripcionUpdate">Descripcion Del Producto:</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                    onclick="updated()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Rol</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h3 id="mensajeEliminar"></h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                    onclick="deleted()">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<?php
//* body
include_once "footer.php";
?>

<script src="assets/js/productos.js"></script>