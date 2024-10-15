<?php
session_start();
include 'koneksi.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $gambar = $_FILES['gambar']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($gambar);

  // Get the file extension
  $file_extension = pathinfo($gambar, PATHINFO_EXTENSION);

  // Generate new filename with current timestamp (yyyy-mm-dd hh.mm.ss)
  $new_filename = date('Y-m-d H.i.s') . '.' . $file_extension;

  // Set the target directory and filename
  $target_dir = "uploads/";
  $target_file = $target_dir . $new_filename;

  // Upload file gambar
  if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
    // Insert ke database
    $sql = "INSERT INTO program_donasi (judul, deskripsi, gambar) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$judul, $deskripsi, $target_file])) {
      echo "Program donasi berhasil ditambahkan.";
    } else {
      echo "Gagal menambahkan program donasi.";
    }
  } else {
    echo "Gagal mengupload gambar.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="posttest.css">
  <title>Tambah Program Donasi</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
    }

    nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .nav-links {
      list-style-type: none;
      padding: 0;
    }

    .nav-links li {
      display: inline;
      margin: 0 15px;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
    }

    main {
      padding: 20px;
      max-width: 600px;
      margin: auto;
      background-color: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
    }

    button {
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #0056b3;
    }

    #mode-toggle {
      margin-left: auto;
       padding: 5px 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <div class="logo">Donasi<span>Kita</span></div>
      <ul class="nav-links" id="nav-links">
        <li><a href="index.php#home">Home</a></li>
        <li><a href="index.php#about">About Us</a></li>
        <li><a href="index.php#programs">Programs</a></li>
        <li><a href="index.php#donation">Donate</a></li>
        <li><a href="index.php#testimonials">Testimonials</a></li>
        <li><a href="index.php#contact">Contact</a></li>
        <li><a href="kelola_program.php">Kelola Program</a></li>
        <?php if (isset($_SESSION['username'])): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
      <button id="mode-toggle" class="mode-toggle"><b>Dark Mode</b></button>
      <div class="burger" id="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </nav>
  </header>

  <main style="margin-top: 50px">
    <h2>Tambah Program Donasi</h2>
    <form method="POST" enctype="multipart/form-data">
      <label for="judul">Judul Program:</label>
      <input type="text" id="judul" name="judul" required>

      <label for="deskripsi">Deskripsi:</label>
      <textarea id="deskripsi" name="deskripsi" required></textarea>

      <label for="gambar">Gambar:</label>
      <input type="file" id="gambar" name="gambar" accept="image/*" required>

      <button type="submit">Tambah Program</button>
    </form>
  </main>
</body>

</html>