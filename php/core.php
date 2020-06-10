<?php
    $data = Array();


    $data['no_peserta']             = $_POST["no_peserta"];
    $data['nama_lengkap']           = $_POST["nama_lengkap"];
    $data['tempat_tanggal_lahir']   = $_POST["tempat_tanggal_lahir"];
    $data['jurusan']                = $_POST["jurusan"];
    $data['alamat']                 = $_POST["alamat"];
    
    $link = mysqli_connect("localhost", "root", "", "crud_sekolah");
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    // Attempt insert query execution
    $sql = "INSERT INTO student (no_peserta, nama_lengkap, tempat_tanggals_lahir,jurusan,alamat) VALUES ('".$data['no_peserta']."', '".$data['nama_lengkap']."','".$data['tempat_tanggal_lahir']."','".$data['jurusan']."','".$data['alamat']."')";

    if(mysqli_query($link, $sql)){
        echo 1;
    } else{
        echo 0;
    }
    
    // Close connection
    mysqli_close($link);
?>