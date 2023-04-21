<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buku_tamu_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Menambahkan data baru ke tabel buku_tamu
    $sql = "INSERT INTO buku_tamu (NAMA, Tipe_Data , Panjang_Batas) 
    VALUES ('ID_BT', 'INT', '10'), ('NAMA', 'VARCHAR', '200'), ('EMAIL', 'VARCHAR', '50'), ('ISI', 'TEXT', )";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql."<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
  ?>
  
