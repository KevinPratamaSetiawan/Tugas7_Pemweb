<?php
include('connect-to-db.php');

if (isset($_GET['del'])) {
    $delete_kode = $_GET['del'];

    $delete_query = "DELETE FROM mahasiswa WHERE nim = '$delete_kode' OR nama = '%$delete_kode%'";

    if (mysqli_query($conn, $delete_query)) {
        echo "Data berhasil dihapus.";
        header('location:index.php');
    } else {
        echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
    }
}

?>