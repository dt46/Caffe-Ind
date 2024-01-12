<?php
session_start();

// Cek apakah user telah login
if (isset($_SESSION['user_id'])) {
  // Mengambil nilai session
  $user_id = $_SESSION['user_id'];
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  $nama = $_SESSION['nama'];
  $profile_picture = $_SESSION['profile_picture'];
  $email = $_SESSION['email'];
  $nomor_hp = $_SESSION['nomor_hp'];
  $usia = $_SESSION['usia'];
  $jenis_kelamin = $_SESSION['jenis_kelamin'];
} else {
  // Redirect atau tindakan lain jika user belum login
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/caffe-ind.png" type="image/x-icon" />
  <title>Caffe-Ind</title>
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/caffenchat.css">
  <!-- Library AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- Javascript -->
  <script src="js/script.js"></script>
  <script src="js/aos.js"></script>
</head>

<body>
  <!-- Nav Start -->
  <nav class="navbar sticky-top navbar-expand-lg custom-navbar-bg">
    <div class="container-fluid">
      <a class="navbar-brand me-auto" href="#">
        <img src="assets/logo airin nav admin.png" alt="" class="regular-logo">
      </a>
      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item my-auto">
            <a class="nav-link" aria-current="page" href="adminpage.php">Home</a>
          </li>
          <li class="nav-item my-auto">
            <a class="nav-link" href="konsumen.php">Konsumen</a>
          </li>
          <li class="nav-item my-auto">
            <a class="nav-link" href="kopi.php">Caffe-Tracker</a>
          </li>
          <li class="nav-item my-auto">
            <a class="nav-link active" href="caffenchat.php">Caffe-nChat</a>
          </li>
          <li class="nav-item my-auto dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="assets/<?php echo $_SESSION['profile_picture']; ?>" alt="" class="profile-picture">
            </a>
            <ul class="dropdown-menu px-4 py-1 dropdown-menu-end">
              <li>
                <img src="assets/lihatProfil.png" alt="">
                <a class="dropdown-item" href="lihatProfil.php">Lihat Profil</a>
              </li>
              <li>
                <img src="assets/editProfil.png" alt="">
                <a class="dropdown-item" href="editProfil.php?id=<?php echo $user_id; ?>">Edit Profil</a>
              </li>
              <li>
                <img src="assets/lupaPassword.png" alt="">
                <a class="dropdown-item" href="settingVerifikasiLlupaPassword.php?id=<?php echo $user_id; ?>">Lupa Password</a>
              </li>
              <li>
                <img src="assets/gantiPassword.png" alt="">
                <a class="dropdown-item" href="gantiPasswordSignPasswordLama.php">Ganti Password</a>
              </li>
              <li>
                <img src="assets/hapusAkun.png" alt="">
                <a class="dropdown-item" href="hapusAdmin.php?id=<?php echo $user_id; ?>">Hapus Akun</a>
              </li>
              <li class="logout"><a class="dropdown-item logout-link" href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Nav End -->

  <!-- Landing Page Start -->
  <div class="landing-page">
    <img src="assets/bg admin 1.png" alt="" class="top-right">
    <div class="container">
      <?php
      $cUrl = curl_init();

      $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllReportTopik',
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true
      );

      curl_setopt_array($cUrl, $options);

      $response = curl_exec($cUrl);

      $reportTopik = json_decode($response);

      curl_close($cUrl);

      // Inisialisasi array untuk melacak topik-topik yang sudah ditampilkan
      $topikSudahDitampilkan = array();

      foreach ($reportTopik as $row) :

        if (!in_array($row->id_topik, $topikSudahDitampilkan)) {
          $topikSudahDitampilkan[] = $row->id_topik;
        }
      endforeach;

      $cUrl = curl_init();

      $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllReportBalasan',
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true
      );

      curl_setopt_array($cUrl, $options);

      $response = curl_exec($cUrl);

      $reportBalasan = json_decode($response);

      curl_close($cUrl);

      // Inisialisasi array untuk melacak balasan-balasan yang sudah ditampilkan
      $balasanSudahDitampilkan = array();

      foreach ($reportBalasan as $row) :
        if (!in_array($row->id_balasan, $balasanSudahDitampilkan)) {
          $balasanSudahDitampilkan[] = $row->id_balasan;
        }
      endforeach;

      $jumlahTopik = count($topikSudahDitampilkan);
      $jumlahBalasan = count($balasanSudahDitampilkan);
      ?>
      <div class="menu">
        <a href="topik.php" class="card-menu" data-aos="fade-right">
          <img src="assets/menuChatBig.png" alt="">
          <div class="teks">
            <h2>Data Forum Diskusi</h2>
            <h3>Akses detail data seluruh data forum diskusi konsumen di sini!</h3>
          </div>
        </a>
        <a href="laporanPesan.php" class="card-menu" data-aos="fade-left">
          <?php
          if ($jumlahTopik > 0 || $jumlahBalasan > 0) {
            echo '<div class="notification">
                    <p>Laporan Topik: ' . $jumlahTopik . '</p>
                    <p>Laporan Balasan: ' . $jumlahBalasan . '</p>
                  </div>';
          }
          ?>
          <img src="assets/menuLaporan.png" alt="">
          <div class="teks">
            <h2>Laporan Pesan</h2>
            <h3>Akses detail Laporan Pesan konsumen di sini!</h3>
          </div>
        </a>
      </div>
    </div>
    <img src="assets/bg_3d_kopi_kiri.png" alt="" class="bottom-left">
  </div>
  <!-- Landing Page End -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>