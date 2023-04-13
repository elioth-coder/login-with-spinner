<?php
session_start();


if(!empty($_SESSION['logged_in'])) {
    die(header("Location: home.php"));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <h1>Login here:</h1>
    <form id="loginForm" action="login.php" method="POST">
        <label for="">Enter username: 
            <input type="text" name="username" id="username">
        </label><br>
        <label for="">
            Enter password:
            <input type="password" name="password" id="password">
        </label><br>
        <hr>
        <button type="submit" id="submit">Login</button>
        <span id="spinner" style="vertical-align: middle; display:none;">
            <img src="spinner.gif" style="width: 30px; height: 30px;" />
            Processing...
        </span>
    </form>
    <p id="timer"></p>
    <script>


        function countdown(seconds) {
            remaining = seconds;
            let reset = () => {
                timer.innerHTML = ""; 
                submit.removeAttribute('disabled');
                username.removeAttribute('disabled');
                password.removeAttribute('disabled');
            }
            let tick = () => {
                timer.innerHTML = "Try again after " + remaining + " seconds"; 

                setTimeout(() => {
                    remaining--;

                    if(remaining > 0) {
                        tick();
                    } else {
                        reset();
                    }
                }, 1000);
            }

            tick();
        }


        loginForm.onsubmit = async (e) => {
            spinner.style.display = "block";
            e.preventDefault();
            console.log("form submitted");

            formData = new FormData(loginForm);
            console.log(formData.get('username'));
            console.log(formData.get('password'));

            let response = await fetch('login.php', {
                method: 'POST',
                body: formData,
            });
            let data = await response.json();
            
            spinner.style.display = "none";
            if(data.status == 'success') {
                alert(data.message);
                window.location.href = 'home.php';
            } else {
                alert(data.message);

                if(data.limit_reached) {
                    submit.setAttribute('disabled', true);
                    username.setAttribute('disabled', true);
                    password.setAttribute('disabled', true);

                    if(data.waiting_time > 0) countdown(data.waiting_time);
                }
            }
        }
    </script>
</body>
</html>