function validate() {
    fetch('../controllers/login.validate.php')
        .then(res => res.json())
        .then(data => {
            console.log(data)
            if (!data) {
                window.location.href = 'login.php'
            }
        })
}

validate()