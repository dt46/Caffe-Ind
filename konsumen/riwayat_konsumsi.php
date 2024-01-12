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

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllKonsumsiByUser?id_konsumen=' . $user_id,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);

    curl_close($cUrl);
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
    <link rel="stylesheet" href="css/riwayat_konsumsi.css">
    <!-- Library AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Javascript -->
    <script src="js/script.js"></script>
    <script src="js/aos.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <!-- Nav Start -->
    <nav class="navbar sticky-top navbar-expand-lg custom-navbar-bg">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#">
                <img src="assets/logo airin nav white.png" alt="" class="regular-logo">
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

    <!-- Riwayat Konsumsi Start -->
    <div class="riwayat">
        <div class="container">
            <h3>Riwayat Konsumsi</h3>
            <div class="accordion " id="accordionExample">
                <?php
                function getKopiById($id_kopi)
                {
                    $cUrl = curl_init();

                    $options = array(
                        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKopiById?id=' . $id_kopi,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_RETURNTRANSFER => true
                    );

                    curl_setopt_array($cUrl, $options);

                    $response = curl_exec($cUrl);

                    $kopi = json_decode($response);

                    curl_close($cUrl);

                    return $kopi;
                }

                $hariSudahDitampilkan = array();

                foreach ($data as $row) {

                    $waktu = (empty($row->waktu) ? '' : $row->waktu);
                    $formattedDate = date('Y-m-d', strtotime($waktu));

                    // Generate a unique ID for each accordion item
                    $accordionID = 'collapse' . uniqid();

                    $date = date('l, d F Y', strtotime(empty($row->waktu) ? '' : $row->waktu));

                    if (!in_array($formattedDate, $hariSudahDitampilkan)) {
                        echo '<div class="accordion-item rounded-4" data-aos="zoom-in-up">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#' . $accordionID . '" aria-expanded="false" aria-controls="' . $accordionID . '">
                                        <div class="teks">
                                            <p class="date">' . date('l, d F Y', strtotime(empty($row->waktu) ? '' : $row->waktu)) . '</p>
                                            <p class="status">Klik disini untuk melihat detail konsumsimu</p>
                                        </div>
                                    </button>
                                </h2>
                                <div id="' . $accordionID . '" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">';
                        foreach ($data as $kopi) {

                            $kopiDate = date('l, d F Y', strtotime(empty($kopi->waktu) ? '' : $kopi->waktu));

                            $itemKopi = getKopiById(empty($row->id_kopi) ? '' : $row->id_kopi);

                            // Check if the coffee date matches the formatted date
                            if ($kopiDate == $date) {
                                echo '<div class="coffee">
                                                    <div class="informasi-coffee">
                                                        <img src="' . $itemKopi[0]->foto . '" alt="">
                                                        <div class="info-coffee">
                                                            <h5>' . $itemKopi[0]->nama . '</h5>
                                                            <ul>
                                                                <li>' . (empty($kopi->quantity) ? '' : $kopi->quantity) . ' Cup</li>
                                                                <li>' . $itemKopi[0]->penyajian . '</li>
                                                                <li>' . (empty($kopi->sugar) ? '' : $kopi->sugar) . '</li>
                                                            </ul>
                                                            <div class="additional">
                                        <p>Additional Ingredients: </p>
                                        <ul>';
                                foreach ($row->bahan_tambahan as $ingredient) {
                                    echo '<li>' . $ingredient . '</li>';
                                }
                                echo '</ul>
                                    </div>
                                                            <div class="info-kafein-gula">
                                                                <p><span>Kafein: </span>' . (empty($kopi->kafein) ? '' : $kopi->kafein) . ' mg</p>
                                                                <p><span>Glukosa: </span>' . (empty($kopi->glukosa) ? '' : $kopi->glukosa) . ' gram</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="date">' . date('H:i', strtotime(empty($kopi->waktu) ? '' : $kopi->waktu)) . ' WIB</p>
                                                    <div class="button-coffee">
                                                        <a href="editKonsumsi.php?id=' . (empty($kopi->_id) ? '' : $kopi->_id) . '" class="button-edit">
                                                            <i class="fa-solid fa-pen"></i>
                                                            <p>Edit</p>
                                                        </a>
                                                        <a href="hapusKonsumsi.php?id=' . (empty($kopi->_id) ? '' : $kopi->_id) . '" class="button-delete">
                                                            <i class="fa-solid fa-trash"></i>
                                                            <p>Hapus</p>
                                                        </a>
                                                    </div>
                                                </div>';
                            }
                        }
                        echo '</div>
                                </div>
                            </div>';

                        $hariSudahDitampilkan[] = $formattedDate;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Riwayat Konsumsi End -->

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