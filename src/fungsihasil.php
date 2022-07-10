<?php
    require "koneksi.php";

    if(isset($_POST['edithasila'])){
        $lahan = $_POST['lahan'];
        $hasil = $_POST['hasil'];
        $dp = $_POST['dp'];

        $query = mysqli_query($conn, "update hasila set lahan='$lahan', hasil='$hasil' where id='$dp' ");

        if($query){
            header('location:tabelhasila.php');
        }else{
            echo '
            <script>alert("GAGAL");
            window.location.href="tabelhasila.php"
            </script>
            ';
        }
    }

    // require "koneksi.php";

    if(isset($_POST['edithasilb'])){
        $lahan = $_POST['lahan'];
        $hasil = $_POST['hasil'];
        $dp = $_POST['dp'];

        $query = mysqli_query($conn, "update hasilb set lahan='$lahan', hasil='$hasil' where id='$dp' ");

        if($query){
            header('location:tabelhasilb.php');
        }else{
            echo '
            <script>alert("GAGAL");
            window.location.href="tabelhasilb.php"
            </script>
            ';
        }
    }

    // require "koneksi.php";

    if(isset($_POST['edithasilc'])){
        $lahan = $_POST['lahan'];
        $hasil = $_POST['hasil'];
        $dp = $_POST['dp'];

        $query = mysqli_query($conn, "update hasilc set lahan='$lahan', hasil='$hasil' where id='$dp' ");

        if($query){
            header('location:tabelhasilc.php');
        }else{
            echo '
            <script>alert("GAGAL");
            window.location.href="tabelhasilc.php"
            </script>
            ';
        }
    }
?>