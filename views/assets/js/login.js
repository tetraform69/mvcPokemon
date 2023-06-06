function login() {
    fetch(`../controllers/login.php?correo=${correo.value}&password=${password.value}`)
        .then(response => response.json())
        .then(data => {
            if (data[0] != undefined) {
                window.location.href = "rolesForm.php"
            } else {
                alert('Email or password is incorrect')
            }
        })
}