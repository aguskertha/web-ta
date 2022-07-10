<?php
    require "cek.php";
    require "fungsi.php";
    // require "koneksi.php";
    
?>

<script>
    console.log(<?= json_encode($_SESSION["log"]); ?>);
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Log Plant</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/Chart.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Data Plant</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>           
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                       
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="chartsa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tabel Data
                            </a>
                            <a class="nav-link" href="tabelhasila.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tabel Hasil
                            </a>
                        </div>
                    </div>                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Data Petugas A</h2>
                            <ol class="breadcrumb mb-3">
                                <li class="breadcrumb-item active"></li>
                            </ol>
                            <div class="dropdown my-md-2">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pilih Data Petugas
                                </button>                                   
                                <div class="dropdown-menu dropdown-menu-right">                                       
                                    <a class="dropdown-item" href="indexb.php">Data B</a>
                                    <a class="dropdown-item" href="indexc.php">Data C</a>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">                                   
                                    <div class="card-header bg-dark text-white">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Diagram Kebutuhan Dosis Pupuk Nitrogen (kg/ha)
                                    </div>
                                    <div class="card-body"><iframe src="linecharta.php" width="100%" height="250"></iframe>
                                        <p class="card-text">Sumbu X : Waktu pemberian pupuk <br/> Sumbu Y : Jumlah pupuk nitrogen yang diberikan </p>
                                        <p class="card-text">Periode 1 : Pertama kali tanam 0-14 hari setelah tanam (HST)
                                            <br/>Periode 2 : Fase anakan aktif 21-28 HST
                                            <br/>Periode 3 : Fase primordia bunga 50-63 HST
                                        </p>

                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-dark text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Diagram Hasil Panen Lahan (t/ha)
                                    </div>
                                    <div class="card-body"><iframe src="barcharta.php" width="100%" height="250"></iframe>
                                        <p class="card-text">Sumbu X : Nomer lahan<br/> Sumbu Y : Jumlah panen yang dihasilkan (t/ha)</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                       

                        <div class="card mb-4">
                            <div class="card-header bg-dark text-white">
                                <i class="fas fa-table me-1"></i>
                                Tabel Data Petugas A
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Lahan</th> 
                                            <th>No. Pengukuran</th>                                      
                                            <th>Skala Warna</th>                                                                     
                                            <th>Target (t/ha)</th>
                                            <th>Dosis (kg/ha)</th>                               
                                            <th>Tanggal dan Waktu</th>
                                            
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                            $ambildata = mysqli_query($conn, "select * from a");
                                            while($data=mysqli_fetch_array($ambildata)){
                                                $no = $data['id'];
                                                $lahan = $data['lahan'];
                                                $pengukuran = $data['pengukuran'];                                             
                                                $skala = $data['skala'];
                                                $target = $data['target'];
                                                $dosis = $data['dosis'];
                                                $waktu = $data['datetime'];
                                                
                                                date_default_timezone_set('Asia/Jakarta');
                                                $waktu = date("Y-m-d H:i:s");
                                        ?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><?=$lahan;?></td> 
                                            <td><?=$pengukuran;?></td>                                           
                                            <td><?=$skala;?></td>
                                            <td><?=$target;?></td>
                                            <td><?=$dosis;?></td>
                                            <td><?=$waktu;?></td>                                          
                                           
                                        </tr>

                                        <?php
                                            };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-dark text-white">
                                <i class="fas fa-table me-1"></i>
                                Tabel Hasil Petugas A
                            </div>
                            <div class="card-body">
                                <table id="hasiltable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Lahan</th>                           
                                            <th>Tanggal dan Waktu</th>
                                            <th>Hasil Panen (t/ha)</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                            $ambildata = mysqli_query($conn, "select * from hasila");
                                            while($data=mysqli_fetch_array($ambildata)){
                                                $no = $data['id'];
                                                $lahan = $data['lahan'];
                                                $hasil = $data['hasil'];
                                                date_default_timezone_set('Asia/Jakarta');
                                                $waktu = date("Y-m-d H:i:s");
                                        ?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><?=$lahan;?></td> 
                                            <td><?=$waktu;?></td>
                                            <td><?=$hasil;?></td>
                                            
                                        </tr>

                                        <?php
                                            };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">                  
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/tablehasil.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
       
        
    
        

        
    


    </body>

    

</html>
