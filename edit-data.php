<?php
include('connect-to-db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_nim = $_POST['old_id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi_edit'];

    $query1 = "SELECT * FROM mahasiswa";
    $query2 = "SELECT * FROM mahasiswa";
    $query3 = "SELECT * FROM mahasiswa";
        
    if($nim != ''){
        $query1 = "UPDATE mahasiswa SET nim = '$nim' WHERE nim = '$old_nim'";   
    }
    if($nama != ''){
        $query2 = "UPDATE mahasiswa SET nama = '$nama' WHERE nim = '$old_nim'";   
    }
    if($prodi != ''){
        $query3 = "UPDATE mahasiswa SET prodi = '$prodi' WHERE nim = '$old_nim'";   
    }

    mysqli_query($conn, $query3);
    mysqli_query($conn, $query2);
    mysqli_query($conn, $query1);

    echo "$query1";
    echo "$query2";
    echo "$query3";
    
    header('location:index.php');
}
?>