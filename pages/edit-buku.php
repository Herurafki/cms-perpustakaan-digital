<?php
  session_start();

  if (!isset($_SESSION['login'])) {
      header("Location: ../index.php");
      exit;
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
    $activemenu = 'daftar kategori';
    include '../includes/sidebar.php';
    ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item ">Buku</li>
          <li class="breadcrumb-item active">Edit Buku</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class = "card">
    <div class="card-body">
              <h5 class="card-title">Edit Buku</h5>

              <?php
                include '../controller/editbukuController.php';
              ?>
              <!-- Vertical Form -->
              <form class="row g-3" action="../controller/editbukuController.php" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Judul Buku</label>
                  <input type="text" class="form-control" id="inputNanme4" name="judul" value="<?php echo $book['judul_buku']; ?>">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Kategori</label>
                  <select name="kategori" class="form-select" aria-label="Default select example">
                      <option value="">Open this select menu</option>
                      <?php
                        include '../config/database.php';
                        $result = $conn->query("SELECT * FROM kategoris");
                        while($row = $result->fetch_assoc()) {
                            $selected = ($row['id'] == $book['id_kategori']) ? "selected" : "";
                            echo "<option value='" . $row['id'] . "' $selected>" . $row['nama_kategori'] . "</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Deskripsi</label>
                  <textarea class="form-control" style="height: 100px" name="deskripsi"><?php echo $book['deskripsi']; ?></textarea>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Jumlah</label>
                  <input type="number" class="form-control" name="jumlah" value="<?php echo $book['jumlah']; ?>">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">File Buku</label>
                  <input class="form-control" type="file" id="formFile" name="file" accept=".pdf" >
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">File Cover</label>
                  <input class="form-control" type="file" id="formFile" name="cover" accept=".jpeg,.jpg,.png" >
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
        </div>
    <section class="section dashboard">
     

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