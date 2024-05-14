<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <form action="/users" method="post">
        <label for="name">Name:</label><input type="text" name="name" id="name"><br>
        <label for="email">Email:</label><input type="email" name="email" id="email"><br>
        <label for="password">Pasword:</label><input type="password" name="password" id="password"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>

