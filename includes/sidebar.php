<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link <?php echo ($activepage != 'dashboard') ? 'collapsed' : ''; ?>" href="dashboard.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link <?php echo ($activepage != 'buku') ? 'collapsed' : ''; ?>" data-bs-target="#buku-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Buku</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="buku-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="buku.php">
          <i class="bi bi-circle <?php echo ($activemenu == 'daftar buku') ? 'active' : ''; ?>"></i><span>Daftar Buku</span>
        </a>
      </li>
      <li>
        <a href="input-buku.php">
          <i class="bi bi-circle <?php echo ($activemenu == 'input buku') ? 'active' : ''; ?>"></i><span>Input Buku</span>
        </a>
      </li>
    </ul>
    <a class="nav-link <?php echo ($activepage != 'kategori buku') ? 'collapsed' : ''; ?>" data-bs-target="#kategori-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Kategori Buku</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="kategori-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="kategori.php">
          <i class="bi bi-circle <?php echo ($activemenu == 'daftar kategori') ? 'active' : ''; ?>"></i><span>Daftar Kategori Buku</span>
        </a>
      </li>
      <li>
        <a href="input-kategori.php">
          <i class="bi bi-circle <?php echo ($activemenu == 'input kategori') ? 'active' : ''; ?>"></i><span>Input Kategori Buku</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->


  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link <?php echo ($activepage != 'profil') ? 'collapsed' : ''; ?>" href="profil.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="../logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Logout</span>
    </a>
  </li><!-- End Login Page Nav -->


</ul>

</aside><!-- End Sidebar-->
