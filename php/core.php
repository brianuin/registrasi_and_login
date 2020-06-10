<?php
    
    $link = mysqli_connect("localhost", "root", "", "crud_sekolah");
     
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if($_POST['type'] == 'store_biodata'){
        $data = Array();
        $data['no_peserta']             = $_POST["no_peserta"];
        $data['nama_lengkap']           = $_POST["nama_lengkap"];
        $data['tempat_tanggal_lahir']   = $_POST["tempat_tanggal_lahir"];
        $data['jurusan']                = $_POST["jurusan"];
        $data['alamat']                 = $_POST["alamat"];
        $data['rata_rata_nilai_akhir']  = $_POST["rata_rata_nilai_akhir"];
        $data['tahun_lulus']            = $_POST["tahun_lulus"];
        
       
        
        // Attempt insert query execution
        $sql = "INSERT INTO student (no_peserta, nama_lengkap, tempat_tanggal_lahir,jurusan,alamat,rata_rata_nilai_akhir,tahun_lulus) VALUES ('".$data['no_peserta']."', '".$data['nama_lengkap']."','".$data['tempat_tanggal_lahir']."','".$data['jurusan']."','".$data['alamat']."','".$data['rata_rata_nilai_akhir']."','".$data['tahun_lulus']."')";
    
        if(mysqli_query($link, $sql)){
            echo 1;
        } else{
            echo 0;
        }
        
        // Close connection
        mysqli_close($link);
    }else if ($_POST['type'] == 'login'){
        $no_peserta            = $_POST["no_peserta"];
        $password              = $_POST["password"];

        $sql = "SELECT * FROM `login_student` WHERE `no_peserta` = '".$no_peserta."' and pass = '".$password."'";
        // $sql = "SELECT * FROM login_student where no_peserta = $no_peserta AND pass= $password";

        $login = mysqli_query($link, $sql);

        $cek = mysqli_num_rows($login);
        // echo $cek;
        
        // echo $no_peserta;
        if($cek > 0){
            session_start();
            $_SESSION['no_peserta'] = $no_peserta;
            $_SESSION['status'] = "login";
            // header("location:admin/index.php");
            echo 1;
        }else{
            // header("location:index.php");	
            echo 0;
        }
    }else if ($_POST['type'] == 'logout'){
        session_start();
        session_destroy();
        echo 1;
    }
?>