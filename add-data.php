<?php
include('connect-to-db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
        
    $query = "INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim','$nama','$prodi')";
        
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan.";
        header('location:index.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>