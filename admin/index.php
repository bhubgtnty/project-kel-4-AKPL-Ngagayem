<?php

include '../config/koneksi.php';
$query = "SELECT * FROM admin WHERE id_admin = 'username'";
$sql = mysqli_query($koneksi, $query);
$row = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ngagayem-Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/images/fav.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <script type="text/javascript">
    var tampil = localStorage.getItem('id_admin');
    var tampil2 = localStorage.getItem('username');
  </script>
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="../assets/images/Ngagayem.png" alt="Peonpegu" class="brand-image img-circle elevation-5"
        style="opacity: .9">
        <span class="brand-text font-weight-light">NGAGAYEM</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

            </a>
            <ul class="nav-header">
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Menu</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pelanggan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="produk.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kategori.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="laporan-pembelian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendapatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pembelian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pembelian</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Utama</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Halaman Utama</a></li>
              <li class="breadcrumb-item active">Beranda</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                $queryy = "SELECT COUNT(*) AS username FROM pelanggan";
                $exee = mysqli_query($koneksi,$queryy);
                $data = mysqli_fetch_array($exee);
                ?>
                <h3><?php echo $data['username'];?></h3>

                <p>Data Pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="pelanggan.php" class="small-box-footer">Info Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php 
                $queryy = "SELECT COUNT(*) AS id_produk FROM produk";
                $exee = mysqli_query($koneksi,$queryy);
                $data = mysqli_fetch_array($exee);
                ?>
                <h3><?php echo $data['id_produk'];?></h3>

                <p>Data Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-camera"></i>
              </div>
              <a href="produk.php" class="small-box-footer">Info Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                $queryy = "SELECT COUNT(*) AS id_pembelian FROM pembelian";
                $exee = mysqli_query($koneksi,$queryy);
                $data = mysqli_fetch_array($exee);
                ?>
                <h3><?php echo $data['id_pembelian'];?></h3>

                <p>Data Pembelian</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-pie"></i>
              </div>
              <a href="pembelian.php" class="small-box-footer">Info Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>  
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <!-- DONUT CHART -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Pendapatan</h3>
          </div>
          <div class="card-body">
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Data yang diambil dari PHP
    const labels = <?php
      $query = "SELECT DATE_FORMAT(tanggal_pembelian, '%Y-%m') AS bulan, SUM(total_pembelian) AS total
                FROM pembelian
                WHERE status_pembelian != 'pending'
                GROUP BY bulan
                ORDER BY bulan ASC";
      $result = mysqli_query($koneksi, $query);

      $labels = [];
      $data = [];
      while ($row = mysqli_fetch_assoc($result)) {
          $labels[] = $row['bulan'];
          $data[] = $row['total'];
      }
      echo json_encode($labels);
    ?>;

    const data = <?php echo json_encode($data); ?>;

    // Konfigurasi Chart.js
    const ctx = document.getElementById('barChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Pendapatan',
          backgroundColor: 'rgba(255, 159, 64, 0.8)',
          borderColor: 'rgba(255, 159, 64, 1)',
          data: data
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });
</script>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

  <!-- Control Sidebar -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>


</body>
</html>
