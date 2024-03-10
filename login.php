<?php
session_start(); // Start the session at the beginning of your script

if (isset($_POST["login"])) {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $errors = array();
    
    // ... (your existing validation code)

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        require_once "regisdatabase.php";
        $sql = "SELECT * FROM registration WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    // Password is correct, login successful
                    $_SESSION["registration"] = $email;
                    header("Location: index.php");
                    exit;
                } else {
                    // Password is incorrect
                    echo "<div class='alert alert-danger'>Incorrect password</div>";
                }
            } else {
                // Email not found
                echo "<div class='alert alert-danger'>Email not found</div>";
            }
        } else {
            // SQL statement preparation failed
            echo "<div class='alert alert-danger'>Something went wrong</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Personal Website</title>
	<link rel="stylesheet" href="dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    
</head>
<body>
      <header>
        <div class="ul">
            <nav>
                <ul>
                    <a class="welcome" style="font-family: 'Lobster', cursive">Ola! </a>
                    <li class="li"><a href="dashboard.php">Home</a></li>
                    <li class="li"><a href="#Contact">Contact</a></li>
                    <li class="li"><a href="#About">About</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="form-container">
    <form action="login.php" method="post">
        <div class="title" style="font-family: 'Lobster', cursive">Login</div>

            <div class="form-group">
                <label for="email">email: &emsp;</label>
                <input type="text" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password: &emsp;&nbsp;</label>
                <input type="password" name="password">
            </div>
            <div class="to-register">
                <p>Don't have an account? <a id="register-link" href="registration.php" target="_self">Register</a></p>
            </div>
            <div class="form-btn">
                <input type="submit" id="login" name="login" value="login">
            </div>
    </form>
    </div>
    <div>
        <img class="img-login" src="me.jpg">
    </div>
    <footer>
        <p class="rights">2024 My Personal Website. All rights reserved.</p>
        <a href="https://www.facebook.com/jrych0" target="_blank">
            <img src="icons8-facebook-64.png" alt="Facebook Logo" width="30" height="30">
        </a>
        <a href="https://www.instagram.com/jrych_/" target="_blank">
            <img src="icons8-instagram-64.png" alt="instagram Logo" width="30" height="30">
        </a>
        <a href="https://www.tiktok.com/@jrych_" target="_blank">
            <img src="icons8-tiktok-64.png" alt="TikTok Logo" width="30" height="30">
        </a>
    </footer>
</body>
</html>