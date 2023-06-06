<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="assets/js/login.js" defer></script>
</head>

<body>
    <form class="box">
        <h1>Log in</h1>
        <div class="box-input">
            <input type="email" name="correo" id="correo" required>
            <label for="correo">Email</label>
        </div>
        <div class="box-input">
            <input type="password" name="password" id="password" required>
            <label for="password">Password</label>
        </div>
        <button type="button" onclick="login()">Log in</button>
    </form>
</body>

</html>