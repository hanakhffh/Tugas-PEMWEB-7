<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Pegawai_db";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menambahkan data ke tabel pegawai
$sql = "INSERT INTO pegawai (nama, alamat, no_telp, email, gaji) 
VALUES ('John Doe', 'Jalan Raya 123', '081234567890', 'johndoe@example.com', '10000000.00'),
       ('Jane Doe', 'Jalan Kenangan 456', '085678901234', 'janedoe@example.com', '5000000.00'),
       ('Alex Smith', 'Jalan Maju Terus 789', '082345678901', 'alexsmith@example.com', '4000000.00'),
       ('Sarah Johnson', 'Jalan Berjalan 321', '081111111111', 'sarahjohnson@example.com', '3000000.00'),
       ('Michael Lee', 'Jalan Jalan 999', '089876543210', 'michaellee@example.com', '4500000.00')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
