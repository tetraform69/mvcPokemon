let table = new DataTable(document.getElementById("table"), {
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
    },
    dom: 'Bfrtip',
    buttons: [
        {
            extend: "copy",
            text: '<i class="fa-regular fa-copy"></i>',
            titleAttr: "Copiar",
            exportOptions: {
                columns: [0, 1, 2, 3]
            },
            className: "copyDataTable"
        },
        {
            extend: "excel",
            text: '<i class="fa-regular fa-file-excel"></i>',
            titleAttr: "Excel",
            exportOptions: {
                columns: [0, 1, 2, 3]
            },
            className: "excelDataTable"
        },
        {
            extend: "pdf",
            text: '<i class="fa-regular fa-file-pdf"></i>',
            titleAttr: "PDF",
            exportOptions: {
                columns: [0, 1, 2, 3]
            },
            className: "pdfDataTable",
            download: "open"
        },
        {
            extend: "print",
            text: '<i class="fa-solid fa-print"></i>',
            titleAttr: "Imprimir",
            exportOptions: {
                columns: [0, 1, 2, 3]
            },
            className: "printDataTable"
        }
    ],
    columns: [
        { data: '#' },
        { data: 'Nombre' },
        { data: 'Estado' },
        { data: 'Fecha De Creacion' },
        { data: 'Opciones' }
    ],
})

function created() {
    url = "/mvcPokemon/rol"

    //* Informacion del formulario
    var data = {
        'name': document.getElementById("nameRol").value
    }

    //* Opciones de la peticion
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
            document.getElementById("nameRol").value = ""
        })
        .catch(error => {
            console.error(`Error al crear el rol: ${error}`);
        })
}

function read() {
    url = "/mvcPokemon/rol"

    fetch(url)
        .then(response => response.json())
        .then(data => {
            table.clear()
            data.forEach((rol, index) => {
                table.row.add({
                    "#": `${++index}`,
                    "Nombre": `${rol.nombreRol}`,
                    "Estado": `<input onclick="statusRol(${rol.id},'${rol.estado}')" class="form-check-input" type="checkbox" role="switch" id="switch${rol.nombreRol}" ${rol.estado == "A" ? "checked" : ""}>
                    <label class="form-check-label" for="switch${rol.nombreRol}">${rol.estado == "A" ? "Activo" : "Inactivo"}</label>`,
                    "Fecha De Creacion": `${rol.fechaCreacion}`,
                    "Opciones": `<a onclick="readID('${rol.id}')" class="btn btn-warning" role="button" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa-solid fa-pen-to-square"></i></i></a>
                    <a onclick="readID('${rol.id}')" class="btn btn-danger" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-trash"></i></a>`
                }).draw()
            })
            // updateEstado()
        })
        .catch(error => {
            console.error(`Error: ${error}`);
        })
}

function readID(id) {
    url = `/mvcPokemon/rol/${id}`

    fetch(url)
        .then(response => response.json())
        .then(data => {
            document.getElementById("rolNameUpdate").value = data[0].nombreRol
            document.getElementById("mensajeEliminar").innerHTML = `Seguro de Eliminar a ${data[0].nombreRol}?`
            localStorage.id = data[0].id
        })
        .catch(error => {
            console.error(`Error: ${error}`);
        })
}

function updated() {
    let id = localStorage.id
    let name = document.getElementById("rolNameUpdate").value
    url = "/mvcPokemon/rol"

    var data = {
        "id": id,
        "name": name
    }

    var options = {
        method: 'PATCH',
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

    let url = "/mvcPokemon/rol"

    let data = {
        "id": id,
    }

    let options = {
        method: "DELETE",
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
            console.error(`Error: ${error}`);
        })
}

function statusRol(id, estado) {
    url = "/mvcPokemon/rol"

    var data = {
        "id": id,
        "estado": estado
    }

    var options = {
        method: 'PUT',
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