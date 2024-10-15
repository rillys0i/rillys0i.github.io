<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = htmlspecialchars(trim($_POST['username']));
  $email = htmlspecialchars(trim($_POST['email']));
  $password = htmlspecialchars(trim($_POST['password']));
  $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

  if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    echo "<h3>All fields are required.</h3>";
  } elseif ($password !== $confirm_password) {
    echo "<h3>Passwords do not match.</h3>";
  } else {
    $sql = "SELECT * FROM akun WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      echo "<h3>Username or Email already exists.</h3>";
    } else {
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO akun (username, email, password) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sss", $username, $email, $hashed_password);

      if ($stmt->execute()) {
        echo "<h3>Registration successful!</h3>";
        header("Location: login.php");
        exit();
      } else {
        echo "<h3>Something went wrong. Please try again.</h3>";
      }
    }

    $stmt->close();
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Register - DonasiKita</title>
</head>

<body>
  <div class="login-container">
    <h1>Register DonasiKita</h1>
    <form method="POST" action="register.php" class="login-form">
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
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>
      <button type="submit" class="submit-btn">Register</button>
    </form>
    <div class="login-link">
      <p>Already have an account? <a href="login.php">Login di sini</a></p>
    </div>
  </div>
</body>

</html>