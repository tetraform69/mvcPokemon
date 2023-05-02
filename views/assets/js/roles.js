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
            console.log(data)
        })
        .catch(error => {
            console.error(`Error al crear el rol: ${error}`);
        })
}

function readed() {

}

function updated() {

}

function deleted() {

}
