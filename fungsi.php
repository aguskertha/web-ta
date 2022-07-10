<?php
    require "koneksi.php";
//updatedata
    if(isset($_POST['editdataa'])){
        $lahan = $_POST['lahan'];
        $pengukuran = $_POST['pengukuran'];
        $skala = $_POST['skala'];
        $target = $_POST['target'];
        $dosis = $_POST['dosis'];
        
        $dp = $_POST['dp'];

        $query = mysqli_query($conn, "update a set lahan='$lahan', pengukuran='$pengukuran', skala='$skala', target='$target', dosis='$dosis' where id='$dp' ");

        if($query){
            header('location:tables.php');
        }else{
            echo '
            <script>alert("GAGAL");
            window.location.href="tables.php"
            </script>
            ';
        }
    }

    if(isset($_POST['editdatab'])){
        $lahan = $_POST['lahan'];
        $pengukuran = $_POST['pengukuran'];
        $skala = $_POST['skala'];
        $target = $_POST['target'];
        $dosis = $_POST['dosis'];
        $dp = $_POST['dp'];

        $query = mysqli_query($conn, "update b set lahan='$lahan', pengukuran='$pengukuran', skala='$skala', target='$target', dosis='$dosis' where id='$dp' ");

        if($query){
            header('location:tablesb.php');
        }else{
            echo '
            <script>alert("GAGAL");
            window.location.href="tablesb.php"
            </script>
            ';
        }
    }

    if(isset($_POST['editdatac'])){
        $lahan = $_POST['lahan'];
        $pengukuran = $_POST['pengukuran'];
        $skala = $_POST['skala'];
        $target = $_POST['target'];
        $dosis = $_POST['dosis'];
        $dp = $_POST['dp'];

        $query = mysqli_query($conn, "update c set lahan='$lahan', pengukuran='$pengukuran', skala='$skala', target='$target', dosis='$dosis' where id='$dp' ");

        if($query){
            header('location:tablesc.php');
        }else{
            echo '
            <script>alert("GAGAL");
            window.location.href="tablesc.php"
            </script>
            ';
        }
    }

    
?>