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
    $tinggi_badan = $_SESSION['tinggi_badan'];
    $berat_badan = $_SESSION['berat_badan'];
    $status_kehamilan = $_SESSION['status_kehamilan'];
    $riwayat_penyakit = $_SESSION['riwayat_penyakit'];
    $batas_konsumsi_kafein = $_SESSION['batas_konsumsi_kafein'];
    $batas_konsumsi_glukosa = $_SESSION['batas_konsumsi_glukosa'];
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
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/input.css">
    <!-- Library AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Javascript -->
    <script src="js/script.js"></script>
    <script src="js/aos.js"></script>
</head>

<body>
    <!-- Nav Start -->
    <nav class="navbar sticky-top navbar-expand-lg custom-navbar-bg">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#">
                <img src="assets/logo airin nav.png" alt="" class="regular-logo">
            </a>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="userpage.php">Home</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="menuUser.php">Menu</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link active" aria-current="page" href="input.php">Caffe-Tracker</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="topik.php">Caffe-nChat</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="aboutUser.php">About</a>
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
                                <a class="dropdown-item" href="hapusKonsumen.php?id=<?php echo $user_id; ?>">Hapus Akun</a>
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
        <div class="content" >
            <div class="header" data-aos="fade-right">
                <div class="content-header" >
                    <div class="teks">
                        <h4>Kopi apa yang kamu minum sekarang?</h4>
                        <p>Input kopimu di Caffe-Tracker sekarang!</p>
                    </div>
                    <div class="button">
                        <a href="" id="get-started-button">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Landing Page End -->

    <hr class="line-after-landingpage">

    <!-- Input Start -->
    <div class="input" id="input-section">
        <div class="background">
            <div class="container">
                <h2 data-aos="zoom-in-up">Pilih menu kopi yang kamu minum</h2>
                <form action="saveKonsumsiKopi.php" method="get">
                    <div class="container-inputKopi">
                        <?php
                        $cUrl = curl_init();

                        $options = array(
                            CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllKopi',
                            CURLOPT_CUSTOMREQUEST => 'GET',
                            CURLOPT_RETURNTRANSFER => true
                        );

                        curl_setopt_array($cUrl, $options);

                        $response = curl_exec($cUrl);

                        $data = json_decode($response);

                        curl_close($cUrl);

                        // Inisialisasi array untuk melacak nama-nama yang sudah ditampilkan
                        $namaSudahDitampilkan = array();

                        foreach ($data as $row) {
                            // Periksa apakah nama sudah ditampilkan sebelumnya
                            if (!in_array($row->nama, $namaSudahDitampilkan)) {
                                echo '<div class="card-input" data-nama-kopi="' . (empty($row->nama) ? '' : $row->nama) . '" data-aos="zoom-in-up">
                                        <div class="content">
                                            <input type="radio" name="pilihan_kopi" style="display: none;">
                                            <h5>' . (empty($row->nama) ? '' : $row->nama) . '</h5>
                                            <img src="' . (empty($row->foto) ? '' : $row->foto) . '" alt="kopi1">
                                        </div>
                                    </div>';

                                // Tambahkan nama ke array untuk menandai bahwa sudah ditampilkan
                                $namaSudahDitampilkan[] = $row->nama;
                            }
                        }
                        ?>
                    </div>
                    <div class="info-lebihlanjut" id="info-lebihlanjut">
                        <div class="container">
                            <div class="content-form" data-aos="zoom-in-up">
                                <div class="card-form"data-aos="fade-right">
                                    <h4>DETAILS</h4>
                                    <h3>Give Us Details What You Drink</h3>
                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="hidden" name="id_konsumen" id="id_konsumen" value="<?php echo $user_id; ?>">
                                    <input type="hidden" name="selected_coffee" id="selected_coffee" value="">
                                    <div class="form-info-lebihlanjut">
                                        <div class="input-lebihlanjut">
                                            <p>Berapa Banyak Cup yang Anda Beli?</p>
                                            <input type="number" placeholder="Type Number" name="quantity" id="quantity" class="input-field">
                                        </div>
                                        <div class="input-lebihlanjut" id="penyajian">
                                            <p>Hot/Cold?</p>
                                            <select class="form-select form-select-lg" aria-label="Large select example" name="penyajian" id="penyajianSelect">
                                                <option selected>Open this select menu</option>
                                                <!-- Other options will be dynamically added here -->
                                            </select>
                                        </div>
                                        <div class="input-lebihlanjut" id="sugar">
                                            <p>Less/Extra Sugar?</p>
                                            <select class="form-select form-select-lg" aria-label="Large select example" name="sugar">
                                                <option selected>Open this select menu</option>
                                                <option value="Less Sugar">Less Sugar</option>
                                                <option value="Normal Sugar">Normal Sugar</option>
                                                <option value="Extra Sugar">Extra Sugar</option>
                                            </select>
                                        </div>
                                        <div class="input-bahantambahan">
                                            <p>Bahan Tambahan</p>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="bahan_tambahan[]" id="cokelat" value="Cokelat" onchange="toggleInput('cokelat')">
                                                <label class="form-check-label" for="cokelat">
                                                    Cokelat
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="bahan_tambahan[]" id="matcha" value="Matcha" onchange="toggleInput('matcha')">
                                                <label class="form-check-label" for="matcha">
                                                    Matcha
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="bahan_tambahan[]" id="icecream" value="Ice Cream" onchange="toggleInput('icecream')">
                                                <label class="form-check-label" for="icecream">
                                                    Ice Cream
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" id="button-send">Submit</button>
                                    </div>
                                </div>             
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Input End -->

    <!-- Footer Start -->
    <footer>
        <div class="container">
            <div class="row1">
                <div class="col" id="col1">
                    <h4>GET IN TOUCH</h4>
                    <div class="row-icon" id="location">
                        <img src="assets/Location white.png" alt="location">
                        <p>SCBD</p>
                    </div>
                    <div class="row-icon">
                        <img src="assets/Phone white.png" alt="phone">
                        <p>+62 8123 4567 890</p>
                    </div>
                    <div class="row-icon">
                        <img src="assets/mail white.png" alt="">
                        <p>airin.jaya14@gmail.com</p>
                    </div>
                </div>
                <div class="col" id="col2">
                    <h4>FOLLOW US</h4>
                    <p>YUK! Kenali Caffe-Ind lebih dekat</p>
                    <div class="socialmedia">
                        <img src="assets/facebook.png" alt="facebook">
                        <img src="assets/instagram.png" alt="instagram">
                        <img src="assets/tiktok.png" alt="tiktok">
                        <img src="assets/twitter.png" alt="twitter">
                    </div>
                </div>
                <div class="col" id="col3">
                    <img src="assets/kopintouch.png" alt="Kop In Touch" id="KopInTouch">
                    <div class="open-hours" id="open-hours">
                        <h5>OPEN HOURS</h5>
                        <div class="row-icon">
                            <img src="assets/Calendar 19.png" alt="day">
                            <p>EVERY DAY</p>
                        </div>
                        <div class="row-icon">
                            <img src="assets/Clock.png" alt="hours">
                            <p>12 .00 PM - 12.00 AM</p>
                        </div>
                    </div>
                    <div class="location" id="location">
                        <h5>LOCATION</h5>
                        <div class="row-icon">
                            <img src="assets/Location white.png" alt="location">
                            <p>Jl. Lodaya I No. 04
                                Babakan, Kota Bogor, Jawa Barat 16128</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row2">
            <hr>
            <p>Copyright © <span>www.caffe-ind.com</span> All Rights Reserved</p>
            <p id="airin">Designed by <span>AIRIN</span></p>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>