<?php
include("config.php");

$error_message = '';  
$is_error = false;  

if (isset($_POST["subbtn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $confirm_pass = $_POST["confirm_password"];

    if ($pass !== $confirm_pass) {
        $error_message = 'Passwords do not match';  
        $is_error = true; 
    } else {
        $query = "INSERT INTO `signup`(`name`, `email`, `password`) 
                  VALUES ('$name', '$email', '$pass')";
        if (mysqli_query($con, $query)) {
            echo "
            <script>
                alert('Registered account');
                location.assign('login.php');
            </script>";
        } else {
            $error_message = 'Registration failed. Please try again later.';
            $is_error = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .form-card {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 500px;
        }

        .btn-primary {
            background-color:rgb(54, 52, 51);
            border: none;
        }

        .btn-primary:hover {
            background-color: #rgb(54, 52, 51);
        }

        .form-title {
            color: #rgb(54, 52, 51);
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-card">
            <h2 class="form-title text-center fw-bold mb-4">Sign Up</h2>

            <form method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full Name" required>
                    <div class="invalid-feedback">Please enter your full Name.</div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    <div class="invalid-feedback">Please provide a valid email address.</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           class="form-control" 
                           id="password" 
                           name="password" 
                           placeholder="Enter your password" 
                           required>
                    <div class="invalid-feedback">
                        Password must be at least 8 characters long, include one uppercase letter, and one special character.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" 
                           class="form-control <?php echo $is_error ? 'is-invalid' : ''; ?>" 
                           id="confirm_password" 
                           name="confirm_password" 
                           placeholder="Confirm your password" 
                           required>
                    <?php if ($is_error) { ?>
                        <div class="invalid-feedback d-block"><?php echo $error_message; ?></div>
                    <?php } else { ?>
                        <div class="invalid-feedback">Passwords must match.</div>
                    <?php } ?>
                </div>

                <button type="submit" name="subbtn" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bootstrap validation for forms
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>

</html>
