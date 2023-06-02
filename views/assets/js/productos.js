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
        { data: 'Precio' },
        { data: 'Cantidad' },
        { data: 'Estado' },
        { data: 'Fecha De Creacion' },
        { data: 'Opciones' }
    ],
})

function created() {
    let name = document.getElementById("name").value
    let precio = document.getElementById("precio").value
    let cantidad = document.getElementById("cantidad").value
    let descripcion = document.getElementById("descripcion").value
    url = "../controllers/productos.create.php"

    var data = {
        "name": name,
        "precio": parseInt(precio),
        "cantidad": parseInt(cantidad),
        "descripcion": descripcion
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
            let inputstext = document.querySelectorAll('input[type="text"')
            let inputsnumber = document.querySelectorAll('input[type="number"')
            inputstext.forEach(input => {
                input.value = ""
            })
            inputsnumber.forEach(input => {
                input.value = ""
            })
        })
        .catch(error => {
            console.error(`Error`);
            read()
        })
}

function read() {
    url = "../controllers/productos.read.php"

    fetch(url)
        .then(response => response.json())
        .then(data => {
            table.clear()
            data.forEach((producto, index) => {
                table.row.add({
                    "#": `${++index}`,
                    "Nombre": `${producto.nombrePro}`,
                    "Precio": `${producto.precioPro}`,
                    "Cantidad": `${producto.cantidadPro}`,
                    "Estado": `<input onclick="status(${producto.id},'${producto.estado}')" class="form-check-input" type="checkbox" role="switch" id="switch${producto.nombrePro}" ${producto.estado == "A" ? "checked" : ""}>
                    <label class="form-check-label" for="switch${producto.nombrePro}">${producto.estado == "A" ? "Activo" : "Inactivo"}</label>`,
                    "Fecha De Creacion": `${producto.fechaCreacion}`,
                    "Opciones": `<a onclick="readID('${producto.id}')" class="btn btn-warning" role="button" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa-solid fa-pen-to-square"></i></i></a>
                    <a onclick="readID('${producto.id}')" class="btn btn-danger" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-trash"></i></a>`
                }).draw()
            })
        })
        .catch(error => {
            console.error(`Error: ${error}`);
        })
}

function readID(id) {
    url = "../controllers/productos.readOne.php"

    var data = {
        "id": id
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
            document.getElementById("nameUpdate").value = data[0].nombrePro
            document.getElementById("precioUpdate").value = data[0].precioPro
            document.getElementById("cantidadUpdate").value = data[0].cantidadPro
            document.getElementById("descripcionUpdate").value = data[0].descripPro
            document.getElementById("mensajeEliminar").innerHTML = `${data[0].nombrePro} ${data[0].descripPro}`
            localStorage.id = data[0].id
        })
        .catch(error => {
            console.error(`Error: ${error}`);
        })
}

function updated() {
    url = "../controllers/productos.update.php"

    let id = localStorage.id
    let name = document.getElementById("nameUpdate").value
    let precio = parseInt(document.getElementById("precioUpdate").value)
    let cantidad = parseInt(document.getElementById("cantidadUpdate").value)
    let descripcion = document.getElementById("descripcionUpdate").value

    let data = {
        "id": id,
        "name": name,
        "precio": precio,
        "cantidad": cantidad,
        "descripcion": descripcion
    }

    let options = {
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

    let url = "../controllers/productos.delete.php"

    let data = {
        "id": id
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
        .then(data => {
            read()
        })
        .catch(error => {
            console.error(`Error: ${error}`);
        })
}

function status(id, estado) {
    url = "../controllers/productos.estado.php"

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

read()