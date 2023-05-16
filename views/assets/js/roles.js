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
                <td><div class="form-check form-switch">
                <input onclick="statusRol(${rol.id},'${rol.estado}')" class="form-check-input" type="checkbox" role="switch" id="switch${rol.nombreRol}" ${rol.estado == "A"? "checked" : ""}>
                <label class="form-check-label" for="switch${rol.nombreRol}">${rol.estado == "A"? "Activo": "Inactivo"}</label>
                </div></td>
                <td>${rol.fechaCreacion}</td>
                <td>
                <a onclick="readID('${rol.id}')" class="btn btn-warning" role="button" data-bs-toggle="modal" data-bs-target="#updateModal">Editar</a>
                <a onclick="readID('${rol.id}')" class="btn btn-danger" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar</a>
                </td>
                </tr>`
            });
            document.getElementById("table-rol").innerHTML = html
            // updateEstado()
        })
        .catch(error => {
            console.error(`Error: ${error}`);
        })
}

function readID(id) {
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
            document.getElementById("rolNameUpdate").value = data[0].nombreRol
            localStorage.id = data[0].id
        })
        .catch(error => {
            console.error(`Error: ${error}`);
        })
}

function updated() {
    let id = localStorage.id
    let name = document.getElementById("rolNameUpdate").value
    url = "../controllers/roles.update.php"

    var data = {
        "id": id,
        "name": name
    }

    var options = {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }

    fetch(url, options)
        .then(response => response.json())
        .then(data => {
            read()
        })
        .catch(error => {
            console.error(`Error`);
            read()
        })
}

function deleted() {
    let id = localStorage.id

    let url = "../controllers/roles.delete.php"

    let data = {
        "id": id,
    }

    let options = {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }

    fetch(url, options)
    .then(response => response.json())
    .then(data =>{
        read()
    })
    .catch(error => {
        console.error(`Error: ${error}`);
    })
}

function statusRol(id, estado) {
    url = "../controllers/roles.estado.php"

    var data = {
        "id": id,
        "estado": estado
    }

    var options = {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }

    fetch(url, options)
        .then(response => response.json())
        .then(data => {
            read()
        })
        .catch(error => {
            console.error(`Error ${error}`);
        })
}

// function updateEstado(){
//     let inputs = document.getElementById("table-rol").getElementsByClassName("form-check-input")
//     let labels = document.getElementById("table-rol").getElementsByClassName("form-check-label")

//     console.log(inputs);
//     for (let i = 0; i < inputs.length; i++) {
//         labels[i].innerHTML == "A"? inputs[i].setAttribute("checked",""): ""
//     } 
// }

window.onload = (event) => {
    read()
}