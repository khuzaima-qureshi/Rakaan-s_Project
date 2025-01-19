<?php
include("config.php");

$error_message = '';
$is_error = false;

if (isset($_POST["subbtn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address_line1 = $_POST["address_line1"];
    $address_line2 = $_POST["address_line2"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postal_code = $_POST["postal_code"];
    $country = $_POST["country"];
    $phone_number = $_POST["phone_number"];
    $created_at = date("Y-m-d H:i:s");

    // Insert query
    $query = "INSERT INTO registration 
                (name, email, address_line1, address_line2, city, state, postal_code, country, phone_number, created_at) 
              VALUES 
                ('$name', '$email', '$address_line1', '$address_line2', '$city', '$state', '$postal_code', '$country', '$phone_number', '$created_at')";

    if (mysqli_query($con, $query)) {
        echo "
        <script>
            alert('Customer registered successfully');
            location.assign('login.php');
        </script>";
    } else {
        $error_message = 'Registration failed. Please try again later.';
        $is_error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Customer Registration</title>
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
            max-width: 600px;
        }

        .btn-primary {
            background-color: rgb(54, 52, 51);
            border: none;
        }

        .btn-primary:hover {
            background-color: rgb(80, 78, 77);
        }

        .form-title {
            color: rgb(54, 52, 51);
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-card">
            <h2 class="form-title text-center fw-bold mb-4">Customer Registration</h2>

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
                    <label for="address_line1" class="form-label">Address Line 1</label>
                    <input type="text" class="form-control" id="address_line1" name="address_line1" placeholder="Enter your address" required>
                    <div class="invalid-feedback">Please provide your address.</div>
                </div>

                <div class="mb-3">
                    <label for="address_line2" class="form-label">Address Line 2</label>
                    <input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="Enter your address (optional)">
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" required>
                    <div class="invalid-feedback">Please provide your city.</div>
                </div>

                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter your state" required>
                    <div class="invalid-feedback">Please provide your state.</div>
                </div>

                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Enter your postal code" required>
                    <div class="invalid-feedback">Please provide your postal code.</div>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country" required>
                    <div class="invalid-feedback">Please provide your country.</div>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>
                    <div class="invalid-feedback">Please provide your phone number.</div>
                </div>

                <button type="submit" name="subbtn" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
