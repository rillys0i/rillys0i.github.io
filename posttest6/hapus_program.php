<?php
session_start();
include 'koneksi.php'; // Koneksi ke database

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM program_donasi WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  header("Location: kelola_program.php"); // Arahkan kembali ke halaman kelola
  exit();
} else {
  header("Location: kelola_program.php"); // Jika tidak ada ID, arahkan ke kelola
  exit();
}
