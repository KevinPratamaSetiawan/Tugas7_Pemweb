<?php
include('connect-to-db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="title"><h1>Daftar Mahasiswa</h1></div>

    <div class="container">
        <div class="content1">
            <div class="btn_container">
                <button onclick="open_add()">+</button>

                <div id="form1" class="form_container">
                    <form action="add-data.php" method="post">
                        <h3>Tambah Data Mahasiswa</h3>

                        <label for="nim"><b>NIM</b></label><br>
                        <input type="text" name="nim" class="inp_form" required><br>

                        <label for="nama"><b>Nama Lengkap</b></label><br>
                        <input type="text" name="nama" class="inp_form" required><br>

                        <label for="prodi"><b>Program Studi</b></label><br>
                        <!-- <input type="text" name="prodi" class="inp_form" required><br> -->

                        <select name="prodi" id="prodi" class="inp_form" required><br>
                            <option value="" selected disabled>Pilih Prodi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Kimia">Teknik Kimia</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Fisika">Teknik Fisika</option>
                        </select>

                        <button type="submit" class="btn_submit">Tambahkan</button><br>
                        <button type="button" class="btn_cancel" onclick="close_add()">Cancel</button><br>
                    </form>
                </div>

                <button onclick="open_del()">-</button>

                <div id="form2" class="form_container">
                    <form action="del-data.php" method="get">
                        <h3>Hapus Data Mahasiswa</h3>

                        <label for="del"><b>NIM</b></label><br>
                        <input type="text" name="del" class="inp_form" required><br>

                        <button type="submit" class="btn_submit">Hapus</button><br>
                        <button type="button" class="btn_cancel" onclick="close_del()">Cancel</button><br>
                    </form>
                </div>
            </div>
        

            <div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                    <select name="prodi_src" id="prodi_src">
                        <option value="" selected disabled>Cari Prodi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Kimia">Teknik Kimia</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Fisika">Teknik Fisika</option>
                    </select>
                    <button type="submit" class="search_btn">Cari</button>
                    </form>

                    <?php
                    if($_POST['prodi_src'] != ''){
                        $chosen = $_POST['prodi_src']; 
                        $query = "SELECT * FROM mahasiswa WHERE prodi = '$chosen' ORDER BY nim ASC";
                    }else{
                        $query = "SELECT * FROM mahasiswa ORDER BY nim ASC ";
                    }

                    $result = $conn->query($query);
                    ?>
            </div>
        </div>

        <div class="content2">
            <table>
                <tr class="thead">
                    <td>NIM</td>
                    <td>Nama</td>
                    <td>Program Studi</td>
                    <td>Edit</td>
                </tr>

                <?php
                $id_count = 0;

                while($rows=$result->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $rows['nim'];?></td>
                    <td><?php echo $rows['nama'];?></td>
                    <td><?php echo $rows['prodi'];?></td>
                    <td>
                        <button onclick="open_edit('<?php echo 'num'.$id_count; ?>')" class="edit_btn">Edit</button>
                        <div class="relatives_div">
                        <div id="<?php echo 'num'.$id_count; ?>" class="form_container form3">
                            <form action="edit-data.php" method="post">
                                <h3>Edit Data Mahasiswa "<?php echo $rows['nim']; ?>"</h3>
                                <input type="hidden" name="old_id" value="<?php echo $rows['nim']; ?>">

                                <label for="nim"><b>NIM</b></label><br>
                                <input type="text" name="nim" class="inp_form"><br>

                                <label for="nama"><b>Nama Lengkap</b></label><br>
                                <input type="text" name="nama" class="inp_form"><br>

                                <label for="prodi_edit"><b>Program Studi</b></label><br>
                
                                <select name="prodi_edit" id="prodi_edit" class="inp_form"><br>
                                    <option value="" selected disabled>Pilih Prodi</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Teknik Kimia">Teknik Kimia</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                    <option value="Teknik Fisika">Teknik Fisika</option>
                                </select>

                                <button type="submit" class="btn_submit">Edit</button><br>
                                <button type="button" class="btn_cancel" onclick="close_edit('<?php echo 'num'.$id_count; ?>')">Cancel</button><br>
                            </form>
                        </div>
                        </div>
                    </td>
                </tr>

                <?php
                    $id_count++;
                    }

                    $_POST['prodi_src'] = '';
                ?>
            </table>
        </div>
    </div>

    <script>
        function open_add(){
            document.getElementById("form1").style.display = "block";
            document.getElementById("form2").style.display = "none";
            document.getElementsByClassName("form_container").style.display = "none";
        }

        function close_add(){
            document.getElementById("form1").style.display = "none";
        }

        function open_del(){
            document.getElementById("form2").style.display = "block";
            document.getElementsByClassName("form_container").style.display = "none";
            document.getElementById("form1").style.display = "none";
        }

        function close_del(){
            document.getElementById("form2").style.display = "none";
        }

        function open_edit(id){
            document.getElementById(id).style.display = "block";
            document.getElementById("form2").style.display = "none";
            document.getElementById("form1").style.display = "none";
            document.getElementsByClassName("form_container").style.display = "none";
        }

        function close_edit(id){
            document.getElementById(id).style.display = "none";
        }
    </script>
</body>
</html>
