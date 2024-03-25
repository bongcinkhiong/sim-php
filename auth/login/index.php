<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1> <br>

    <form action="proses_login.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required> <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required> <br>

        <button type="submit" name="login">Submit</button>
    </form>
</body>
</html>