//? drag and drop

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    console.log(ev)
    let namePokemon
    switch (ev.target.nodeName) {
        case "DIV":

        case "A":
            namePokemon = ev.target.id.slice(4).toLowerCase()
            break
        case "IMG":
            namePokemon = ev.target.id.slice(3).toLowerCase()
            break
    }
    ev.dataTransfer.setData("name", namePokemon);
}

function drop(ev) {
    ev.preventDefault();
    
    var data = ev.dataTransfer.getData("name");

    console.log(data)
    document.getElementById('offcanvas-body').innerHTML += data
}