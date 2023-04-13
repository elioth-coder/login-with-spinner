<?php
session_start();

if(empty($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    die(header("Location: ./"));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You are logged in</title>
</head>
<body>
    <h1>You are logged in</h1>
    <a href="logout.php">Log out</a>
</body>
</html>