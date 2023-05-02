function created() {
    url = "../controllers/roles.create.php"

    //* Informacion del formulario
    var data = {

    }

    //* Opciones de la peticion
    var options = {

    }

    fetch(url, {
        options
    })
        .then(response => response.json())
        .then(data => {
            console.log(data)
        })
        .catch(error =>{
            console.error(`Error al crear el rol: ${error}`);
        })
}

function readed() {

}

function updated() {

}

function deleted() {

}
