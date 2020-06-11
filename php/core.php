<?php
    
    $link = mysqli_connect("localhost", "root", "", "crud_sekolah");
     
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if($_POST['type'] == 'store_biodata'){
        $data = Array();
        $data['no_peserta']             = $_POST["no_peserta"];
        $data['tempat_tanggal_lahir']   = $_POST["tempat_tanggal_lahir"];
        $data['no_induk_siswa']         = $_POST["no_induk_siswa"];
        $data['nama_lengkap']           = $_POST["nama_lengkap"];
        $data['alamat']                 = $_POST["alamat"];
        $data['jurusan']                = $_POST["jurusan"];
        $data['tanggal_masuk']          = $_POST["tanggal_masuk"];
        $data['sekolah_asal']           = $_POST["sekolah_asal"];
        $data['rata_rata_nilai_akhir']  = $_POST["rata_rata_nilai_akhir"];
        $data['tahun_lulus']            = $_POST["tahun_lulus"];
        
       
        
        // Attempt insert query execution
        $sql = "INSERT INTO `siswa` (`id`, `no_peserta`, `tempat_tanggal_lahir`, `no_induk_siswa`, `nama_lengkap`, `alamat`, `jurusan`, `tanggal_masuk`, `sekolah_asal`, `rata_rata_nilai_akhir`, `tahun_lulus`) VALUES (NULL, '".$data['no_peserta']."', '".$data['tempat_tanggal_lahir']."', '".$data['no_induk_siswa']."', '".$data['nama_lengkap']."', '".$data['alamat']."', '".$data['jurusan']."', '".$data['tanggal_masuk']."', '".$data['sekolah_asal']."', '".$data['rata_rata_nilai_akhir']."', '".$data['tahun_lulus']."')";
    
        if(mysqli_query($link, $sql)){
            echo 1;
        } else{
            echo $sql;
        }
        
        // Close connection
        mysqli_close($link);
    }else if ($_POST['type'] == 'login'){
        $table  = $_POST['table'];
        if($table == 'login_student'){
            $username              = $_POST["no_peserta"];
            $password              = $_POST["password"];
            $colom                 = 'no_peserta';
        }else{
            $username              = $_POST["nip"];
            $password              = $_POST["password"];
            $colom                 = 'nip';
        }
        

        $sql = "SELECT * FROM `$table` WHERE `$colom` = '".$username."' and password = '".$password."'";

        $login = mysqli_query($link, $sql);

        $cek = mysqli_num_rows($login);
        // echo $cek;
        
        // echo $no_peserta;
        if($cek > 0){
            session_start();

            $_SESSION['user'] = $username;
            $_SESSION['status'] = "login";
            echo 1;
        }else{
            echo 0;
        }
    }else if ($_POST['type'] == 'logout'){
        session_start();
        session_destroy();
        echo 1;
    }else if ($_POST['type'] == 'select_data'){

        $sql = "SELECT * FROM `siswa` WHERE `id` = '".$_POST['id']."'";

        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);

        $data['id'] = $row['id'];
        $data['no_peserta'] = $row['no_peserta'];
        $data['tempat_tanggal_lahir'] = $row['tempat_tanggal_lahir'];
        $data['no_induk_siswa'] = $row['no_induk_siswa'];
        $data['nama_lengkap'] = $row['nama_lengkap'];
        $data['alamat'] = $row['alamat'];
        $data['jurusan'] = $row['jurusan'];
        $data['tanggal_masuk'] = $row['tanggal_masuk'];
        $data['sekolah_asal'] = $row['sekolah_asal'];
        $data['rata_rata_nilai_akhir'] = $row['rata_rata_nilai_akhir'];
        $data['tahun_lulus'] = $row['tahun_lulus'];

        echo json_encode($data);
        
    }else if ($_POST['type'] == 'store_update'){

        $data['id'] = $_POST['id_data'];
        $data['no_peserta'] = $_POST['no_peserta'];
        $data['tempat_tanggal_lahir'] = $_POST['tempat_tanggal_lahir'];
        $data['no_induk_siswa'] = $_POST['no_induk_siswa'];
        $data['nama_lengkap'] = $_POST['nama_lengkap'];
        $data['alamat'] = $_POST['alamat'];
        $data['jurusan'] = $_POST['jurusan'];
        $data['tanggal_masuk'] = $_POST['tanggal_masuk'];
        $data['sekolah_asal'] = $_POST['sekolah_asal'];
        $data['rata_rata_nilai_akhir'] = $_POST['rata_rata_nilai_akhir'];
        $data['tahun_lulus'] = $_POST['tahun_lulus'];


        $sql = "UPDATE `siswa` SET `no_peserta` = '".$data['no_peserta']."', `tempat_tanggal_lahir` = '".$data['tempat_tanggal_lahir']."', `no_induk_siswa` = '".$data['no_induk_siswa']."', `nama_lengkap` = '".$data['nama_lengkap']."', `alamat` = '".$data['alamat']."', `jurusan` = '".$data['jurusan']."', `tanggal_masuk` = '".$data['tanggal_masuk']."', `sekolah_asal` = '".$data['sekolah_asal']."', `rata_rata_nilai_akhir` = '".$data['rata_rata_nilai_akhir']."', `tahun_lulus` = '".$data['tahun_lulus']."' WHERE `id` = ".$data['id']."";
    
        if(mysqli_query($link, $sql)){
            echo 1;
        } else{
            echo 0;
        }
        
        // Close connection
        mysqli_close($link);
        
    }
?>