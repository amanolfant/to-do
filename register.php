<?php
$con = mysqli_connect("localhost", "root", "", "to-do");
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['psw'] ?? '';
    $confirm_password = $_POST['confirm_psw'] ?? '';

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        $stmt = $con->prepare("INSERT INTO users (name,email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert ('New user registered successfully please login to proceed further');
            window.location.href='login.php';
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        // echo "<script>alert('Registration successful');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - To-Do Task App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f1f1f1;
        }

        form {
            border: 3px solid #f1f1f1;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
            border-radius: 4px;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.jpg" width="50" height="50" alt="">
            </a>
            <span class="navbar-brand mb-0 h1">To-Do Task App</span>
        </div>
    </nav>

    <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 200px);">
        <form action="register.php" method="post">
            <div class="container">
                <h2 class="text-center mb-4">Register</h2>

                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter name" name="name" required>
                
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label for="confirm_psw"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" name="confirm_psw" required>

                <button type="submit">Register</button>
                
                <div class="login-link">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </div>

            <!-- <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
            </div> -->
        </form>
    </div>

    <footer class="navbar-fixed-bottom bg-dark text-center text-white p-3 mt-5">
        <p>&copy; 2026 To-Do Task App. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>