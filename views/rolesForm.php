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
                    <input type="text" class="form-control" name="formId1" id="formId1" placeholder="example">
                    <label for="formId1">Nombre Del Rol:</label>
                </div>
                <button type="button" class="btn btn-primary" onclick="created()" >Agregar</button>
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
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</form>
<?php
//* body
include_once "footer.php";
?>

<script src="assets/js/roles.js"></script>