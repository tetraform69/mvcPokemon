function login(event) {
    event.preventDefault()

    let url = '/mvcPokemon/login'

    let data = {
        "correo": email.value,
        "password": password.value
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
            if (data.status == "ok") {
                window.location.href = "/mvcPokemon/home"
            }
        })
}