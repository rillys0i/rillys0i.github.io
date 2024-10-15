<?php
session_start();
include 'koneksi.php'; // Koneksi ke database

// Mengambil data program donasi dari database
$sql = "SELECT * FROM program_donasi";
$result = $conn->query($sql);
$programs = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $programs[] = $row;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="posttest.css">
  <title>Kelola Program Donasi</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 0 auto;
      background-color: #f4f4f9;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #AAB396;
      color: white;
    }

    tr:hover {
      background-color: #F7EED3;
    }

    img {
      max-width: 100px;
      height: auto;
    }

    .action-links {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .action-button {
      padding: 5px 10px;
      background-color: #5cb85c;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .action-button:hover {
      background-color: #4cae4c;
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

  <main style="margin: 20px 50px;">
    <h2>Kelola Program Donasi</h2>
    <div style="margin-bottom: 15px;">
      <a href="tambah_program.php" class="action-button">Tambah program</a>
    </div>
    <table>
      <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
      <?php foreach ($programs as $program): ?>
        <tr>
          <td><?php echo htmlspecialchars($program['id']); ?></td>
          <td><?php echo htmlspecialchars($program['judul']); ?></td>
          <td><?php echo htmlspecialchars(substr($program['deskripsi'], 0, 50) . '...'); ?></td>
          <td>
            <img src="<?php echo htmlspecialchars($program['gambar']); ?>" alt="<?php echo htmlspecialchars($program['judul']); ?>">
          </td>
          <td class="action-links">
            <a href="edit_program.php?id=<?php echo htmlspecialchars($program['id']); ?>" class="action-button">Edit</a>
            <a href="hapus_program.php?id=<?php echo htmlspecialchars($program['id']); ?>" class="action-button">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
</body>

</html>