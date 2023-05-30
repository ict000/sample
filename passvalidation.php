




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = $_POST["user_name"];
  $password = $_POST["password"];
  $repeatPassword = $_POST["repeat_password"];

  // Check if passwords match
  if ($password === $repeatPassword) {
    // Proceed with registration process
    // ...

    echo "Registration successful!";
  } else {
    echo "Error: Passwords do not match!";
  }
}

