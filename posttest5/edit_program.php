<?php
session_start();
include 'koneksi.php'; 

if (!isset($_GET['id'])) {
  die("ID program tidak ditemukan.");
}

$id = $_GET['id'];

$sql = "SELECT * FROM program_donasi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$program = $result->fetch_assoc();

if (!$program) {
  die("Program tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $gambar = $_FILES['gambar']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($gambar);

  if (!empty($gambar)) {
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
      $sql = "UPDATE program_donasi SET judul = ?, deskripsi = ?, gambar = ? WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sssi", $judul, $deskripsi, $target_file, $id); // Mengikat parameter
      if ($stmt->execute()) {
        echo "Program donasi berhasil diperbarui.";
      } else {
        echo "Gagal memperbarui program donasi.";
      }
    } else {
      echo "Gagal mengupload gambar.";
    }
  } else {
    $sql = "UPDATE program_donasi SET judul = ?, deskripsi = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $judul, $deskripsi, $id);
    if ($stmt->execute()) {
      echo "Program donasi berhasil diperbarui.";
    } else {
      echo "Gagal memperbarui program donasi.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="posttest.css">
  <title>Edit Program Donasi</title>
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
    </nav>
  </header>

  <main style="margin-top: 50px;">
    <h2>Edit Program Donasi</h2>
    <form method="POST" enctype="multipart/form-data">
      <label for="judul">Judul Program:</label>
      <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($program['judul']); ?>" required>

      <label for="deskripsi">Deskripsi:</label>
      <textarea id="deskripsi" name="deskripsi" required><?php echo htmlspecialchars($program['deskripsi']); ?></textarea>

      <label for="gambar">Gambar:</label>
      <input type="file" id="gambar" name="gambar" accept="image/*">

      <button type="submit">Update Program</button>
    </form>
  </main>
</body>

</html>