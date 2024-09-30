<link rel="stylesheet" href="login.css">

<?php
// login.php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input values
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Display the form data
    echo "<h3>Login Details Submitted:</h3>";
    echo "Username: $username<br>";
    echo "Email: $email<br>";
    echo "Password: " . str_repeat('*', strlen($password)) . "<br>"; // Mask password for security
}
?>

<!-- HTML form for login -->
<form method="POST" action="login.php" class="login-form">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit" class="submit-btn">Login</button>
</form>
