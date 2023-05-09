function created() {
    url = "../controllers/roles.create.php"

    //* Informacion del formulario
    var data = `nameRol=${document.getElementById("nameRol").value}`

    //* Opciones de la peticion
    var options = {
        method: 'POST',
        body: data,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    }

    fetch(url, options)
        .then(response => response.json())
        .then(data => {
            read()
            document.getElementById("nameRol").value = ""
        })
        .catch(error => {
            console.error(`Error al crear el rol: ${error}`);
        })
}

function read() {
    url = "../controllers/roles.read.php"

    fetch(url)
        .then(response => response.json())
        .then(data => {
            html = ""
            data.forEach((rol, index) => {
                html += `
                <tr>
                <th scope="row">${++index}</th>
                <td>${rol.nombreRol}</td>
                <td>${rol.estado}</td>
                <td>${rol.fechaCreacion}</td>
                <td>
                <a onclick="readID('${rol.id}')" class="btn btn-warning" role="button" data-bs-toggle="modal" data-bs-target="#updateModal">Editar</a>
                <a class="btn btn-danger" role="button">Eliminar</a>
                </td>
                </tr>`
            });
            document.getElementById("table-rol").innerHTML = html
        })
        .catch(error => {
            console.error(`Error: ${error}`);
        })
}

function readID(id) {
    console.log(id)
    url = "../controllers/roles.readOne.php"

    var data = `id=${id}`

    var options = {
        method: 'POST',
        body: data,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    }

    fetch(url, options)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            document.getElementById("rolNameUpdate").value = data[0].nombreRol
        })
        .catch(error => {
            console.error(`Error: ${error}`);
        })
}

function updated() {

}

function deleted() {

}

window.onload = (event) => {
    read()
}