<?php

  session_start();

  if (!isset($_SESSION['login'])) {
      header("Location: ../index.php");
      exit;
  }
  
  include '../config/database.php';

  $user_role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

 
  if ($user_role == 'user') {
  $result = $conn->query("SELECT bukus.*, nama_kategori  FROM bukus JOIN kategoris ON bukus.id_kategori = kategoris.id WHERE bukus.id_user = $user_id");
  }else{
    $result = $conn->query("SELECT bukus.*, nama_kategori  FROM bukus JOIN kategoris ON bukus.id_kategori = kategoris.id"); 
  } 
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Buku - Perpustakaan Digital</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>

    <?php
    include '../includes/header.php';

    $activepage = 'buku';
    $activemenu = 'daftar buku';
    include '../includes/sidebar.php';
    ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Buku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item ">Buku</li>
          <li class="breadcrumb-item active">Daftar Buku</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

    <div class="d-flex justify-content-end mb-3">
        <a href="export-buku.php" class="btn btn-danger">
            <i class="bi bi-file-earmark-pdf"></i> Download PDF
        </a>
    </div>
    
    <table class="table datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Deskripsi</th>
                      <th>Jumlah</th>
                      <th>File Buku</th>
                      <th>Cover Buku</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php $nomor = 1;
                    while ($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                      <td><?= $nomor++ ?></td>
                      <td><?= $row['judul_buku'] ?></td>
                      <td><?= $row['nama_kategori'] ?></td>
                      <td><?= $row['deskripsi'] ?></td>
                      <td><?= $row['jumlah'] ?></td>
                      <td><a href='<?= $row['file_buku'] ?>'>Lihat Buku</a></td>
                      <td><img src='<?= $row['cover_buku'] ?>' alt='Cover' width='50'></td>
                      <td>
                          <a class="badge bg-warning" href="edit-buku.php?id=<?php echo $row['id']?>">Edit</a>
                          <a class="badge bg-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus?')" href="hapus.php?id=<?php echo $row['id']?>">Hapus</a>
                      </td>
                  </tr>

                  <?php } ?>

                  </tbody>
                </table>

    </section>

  </main><!-- End #main -->

  <?php
  include '../includes/footer.php';
  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>