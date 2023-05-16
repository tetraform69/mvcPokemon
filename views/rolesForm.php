<?php

include_once "header.php";
//* body
?>
<form id="rolesForm">
    <div class="row">
        <h2 class="text-center bg-dark text-white">Roles</h2>
    </div>

    <div class="row justify-content-center my-1">
        <div class="col-6">
            <form>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nameRol" id="nameRol" placeholder="example">
                    <label for="nameRol">Nombre Del Rol:</label>
                </div>
                <button type="button" class="btn btn-primary" onclick="created()">Agregar</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <h2 class="text-center bg-dark text-white">Datos De Roles</h2>
        <div class="col-8">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha De Creacion</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="table-rol">
                </tbody>
            </table>
        </div>
    </div>
</form>

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Cambiar Nombre</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-update">
                <div class="form-floating mb-3">
                    <input type="hidden" id="rolIDUpdate">
                    <input type="text" class="form-control" name="rolNameUpdate" id="rolNameUpdate" placeholder="@example">
                    <label for="rolNameUpdate">Nombre Del Rol:</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="updated()">Guardar</button>
            </div>
        </div>
    </div>
</div>
<?php
//* body
include_once "footer.php";
?>

<script src="assets/js/roles.js"></script>