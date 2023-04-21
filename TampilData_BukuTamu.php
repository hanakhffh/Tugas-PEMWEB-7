<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buku_tamu_db";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menampilkan data dari tabel buku_tamu
$sql = "SELECT * FROM buku_tamu";
$result = mysqli_query($conn, $sql);

// Memeriksa apakah query berhasil dieksekusi dan mengambil hasilnya
if (mysqli_num_rows($result) > 0) {
    // Menampilkan hasil query
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["ID_BT"]. " - Nama: " . $row["NAMA"]. " - Email: " . $row["EMAIL"]. " - Isi: " . $row["ISI"]. "<br>";
    }
} else {
    echo "Tidak ada data.";
}

mysqli_close($conn);
?>
