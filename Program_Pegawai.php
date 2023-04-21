<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pegawai_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Menambahkan data pegawai baru
if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $gaji = $_POST['gaji'];

    $sql = "INSERT INTO pegawai (nama, alamat, no_telp, email, gaji) VALUES ('$nama', '$alamat', '$no_telp', '$email', '$gaji')";

    if(mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Menghapus data pegawai
if(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM pegawai WHERE id=$id";

    if(mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Mengubah data pegawai
if(isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $gaji = $_POST['gaji'];

    $sql = "UPDATE pegawai SET nama='$nama', alamat='$alamat', no_telp='$no_telp', email='$email', gaji='$gaji' WHERE id=$id";

    if(mysqli_query($conn, $sql)) {
        echo "Data berhasil diubah";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Menampilkan data pegawai
$sql = "SELECT * FROM pegawai";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['alamat'] . "</td>
                <td>" . $row['no_telp'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['gaji'] . "</td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <input type='submit' name='hapus' value='Hapus'>
                    </form>
                    <form method='post'>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <input type='text' name='nama' value='" . $row['nama'] . "'>
                    <input type='text' name='alamat' value='" . $row['alamat'] . "'>
                    <input type='text' name='no_telp' value='" . $row['no_telp'] . "'>
                    <input type='text' name='email' value='" . $row['email'] . "'>
                    <input type='text' name='gaji' value='" . $row['gaji'] . "'>
                    <input type='submit' name='ubah' value='Ubah'>
                </form>
            </td>
        </tr>";
}
echo "</table>";
} else {
    echo "Tidak ada data pegawai";
    }
    
mysqli_close($conn);
?>
    
    