<?php
session_start();

// Cek apakah user telah login
if (isset($_SESSION['user_id'])) {
    // Mengambil nilai session
    $user_id = $_SESSION['user_id'];

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKonsumenById?id=' . $user_id,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);

    curl_close($cUrl);

    $_SESSION['username'] = $data[0]->username;
    $_SESSION['nama'] = $data[0]->nama;
    $_SESSION['profile_picture'] = $data[0]->profile_picture;
    $_SESSION['email'] = $data[0]->email;
    $_SESSION['password'] = $data[0]->password;
    $_SESSION['nomor_hp'] = $data[0]->nomor_hp;
    $_SESSION['usia'] = $data[0]->usia;
    $_SESSION['jenis_kelamin'] = $data[0]->jenis_kelamin;
    $_SESSION['tinggi_badan'] = $data[0]->tinggi_badan;
    $_SESSION['berat_badan'] = $data[0]->berat_badan;
    $_SESSION['status_kehamilan'] = $data[0]->status_kehamilan;
    $_SESSION['riwayat_penyakit'] = $data[0]->riwayat_penyakit;
    $_SESSION['batas_konsumsi_kafein'] = $data[0]->batas_konsumsi_kafein;
    $_SESSION['batas_konsumsi_glukosa'] = $data[0]->batas_konsumsi_glukosa;

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

    $kafein = 0;
    $glukosa = 0;

    $today = date_create('now', new DateTimeZone('Asia/Jakarta'))->format('Y-m-d');

    foreach ($data as $row) :
        $entryDate = date_create(empty($row->waktu) ? 0 : $row->waktu, new DateTimeZone('Asia/Jakarta'))->format('Y-m-d');

        if ($entryDate == $today) {
            $kafein += (empty($row->kafein) ? 0 : $row->kafein);
            $glukosa += (empty($row->glukosa) ? 0 : $row->glukosa);
        }
    endforeach;

    $message = '';
    $image = '';

    if ($kafein <= $_SESSION['batas_konsumsi_kafein'] && $glukosa <= $_SESSION['batas_konsumsi_glukosa']) {
        $message = 'Hebat! Konsumsi kopimu dalam rentang yang baik hari ini.';
        $image = 'good summary.png';
    } elseif ($kafein > $_SESSION['batas_konsumsi_kafein'] && $glukosa <= $_SESSION['batas_konsumsi_glukosa']) {
        $message = 'Hati-hati, konsumsi kafeinmu melebihi batas aman.';
        $image = 'good summary.png';
    } elseif ($kafein <= $_SESSION['batas_konsumsi_kafein'] && $glukosa > $_SESSION['batas_konsumsi_glukosa']) {
        $message = 'Hati-hati, konsumsi glukosamu melebihi batas aman.';
        $image = 'good summary.png';
    } elseif ($kafein > $_SESSION['batas_konsumsi_kafein'] && $glukosa > $_SESSION['batas_konsumsi_glukosa']) {
        $message = 'Waspada! Konsumsi kafein dan glukosamu melebihi batas aman.';
        $image = 'bad summary.png';
    }
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
    <link rel="stylesheet" href="css/userpage.css">
    <!-- Library AOS -->
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Javascript -->
    <script>
        var userId = <?php echo json_encode($user_id); ?>;
    </script>
    <script src="js/scriptUserpage.js"></script>
    <script src="js/chartKafein.js"></script>
    <script src="js/chartGlukosa.js"></script>
    <script src="js/weeklyChart.js"></script>
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
                <img src="assets/logo airin nav.png" alt="" class="scrolled-logo">
            </a>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item my-auto">
                        <a class="nav-link active" aria-current="page" href="userpage.php">Home</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="menuUser.php">Menu</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="input.php">Caffe-Tracker</a>
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
        <div class="background3d">
            <div class="container">
                <div class="glass" data-aos="zoom-in-up">
                    <div class="content">
                        <img src="assets/<?php echo $image; ?>" alt="char3d" id="char3d">
                        <div class="summary">
                            <h4>Hello <?php echo $_SESSION['nama'] ?> !</h4>
                            <h2>Your Summary Today</h2>
                            <p><?php echo $message; ?></p>
                            <div class="consume">
                                <div class="teks">
                                    <h5>Kamu sudah mengkonsumsi:</h5>
                                    <div class="ingredients">
                                        <div class="col1">
                                            <p>Kafein</p>
                                            <p>Glukosa</p>
                                        </div>
                                        <div class="col2">
                                            <p>:</p>
                                            <p>:</p>
                                        </div>
                                        <div class="col3">
                                            <p><?php echo number_format($kafein, 1) ?> mg</p>
                                            <p><?php echo number_format($glukosa, 1) ?> gram</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" data-aos="zoom-in-up" id="rekomendasi-button">Klik untuk lihat menu kopi yang masih bisa kamu minum hari ini!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Landing Page End -->

    <hr class="line-after-landingpage" id="rekomendasi-section">

    <!-- Rekomendasi Start -->
    <div class="rekomendasi" data-aos="zoom-in-up">
        <?php
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllKopi',
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $rekomendasiKopi = json_decode($response);

        curl_close($cUrl);

        $dataKopiTersaring = array();

        // Sesuaikan batas konsumsi kafein dan glukosa
        $batasKafein = $_SESSION['batas_konsumsi_kafein'] - $kafein;
        $batasGlukosa = $_SESSION['batas_konsumsi_glukosa'] - $glukosa;

        foreach ($rekomendasiKopi as $row) {
            // Validasi data sebelum digunakan
            if (isset($row->less_glukosa, $row->normal_glukosa, $row->extra_glukosa, $row->kafein, $row->foto, $row->nama)) {
                $isLessSugar = ($row->less_glukosa <= $batasGlukosa);
                $isNormalSugar = ($row->normal_glukosa <= $batasGlukosa);
                $isExtraSugar = ($row->extra_glukosa <= $batasGlukosa);
                $isKafeinBelowLimit = ($row->kafein <= $batasKafein);

                // Handle kesalahan dalam proses validasi
                if ($isKafeinBelowLimit && ($isLessSugar || $isNormalSugar || $isExtraSugar)) {
                    // Tambahkan data kopi dengan tingkat gula sesuai syarat
                    if ($isLessSugar) {
                        $dataKopiTersaring[] = array("tingkat" => "Less Sugar", "data" => $row);
                    }
                    if ($isNormalSugar) {
                        $dataKopiTersaring[] = array("tingkat" => "Normal Sugar", "data" => $row);
                    }
                    if ($isExtraSugar) {
                        $dataKopiTersaring[] = array("tingkat" => "Extra Sugar", "data" => $row);
                    }
                }
            }
        }
        // Check if there are recommended coffees
        if (count($dataKopiTersaring) > 0) {
        ?>
            <div class="container">
                <h2>Kamu masih bisa minum kopi-kopi ini nih!</h2>
                <div class="coffee">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <?php
                            $count = 0;
                            foreach ($dataKopiTersaring as $item) :
                                $tingkatGula = $item["tingkat"];
                                $card = $item["data"];

                                if ($count % 3 == 0) {
                                    // Start a new carousel item
                                    echo '<div class="carousel-item ' . ($count == 0 ? 'active' : '') . '">';
                                    echo '<div class="cards">';
                                }
                            ?>
                                <div class="card">
                                    <div class="content-rekomendasi">
                                        <img src="<?php echo (empty($card->foto) ? '' : $card->foto) ?>" alt="">
                                        <h4><?php echo (empty($card->nama) ? '' : $card->nama) ?></h4>
                                        <p>Penyajian: <?php echo (empty($card->penyajian) ? '-' : $card->penyajian) ?></p>
                                        <p>Tingkat Gula: <?php echo $tingkatGula; ?></p>
                                    </div>
                                </div>
                            <?php
                                $count++;
                                if ($count % 3 == 0 || $count == count($dataKopiTersaring)) {
                                    // End the current carousel item
                                    echo '</div>';
                                    echo '</div>';
                                }
                            endforeach;

                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="carousel-indicators">
                            <?php
                            // Add carousel indicators for each set of 3 cards
                            for ($i = 0; $i < ceil(count($dataKopiTersaring) / 3); $i++) {
                                echo '<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="' . $i . '" class="' . ($i == 0 ? 'active' : '') . '"></button>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
            // Display a message when there are no recommended coffees
        ?>
            <div class="container">
                <h2>Maaf, tidak ada kopi yang bisa Kamu konsumsi hari ini.</h2>
                <h2>Silakan kembali lagi besok ke KOPinTOUCH <i class="fa-regular fa-heart"></i></h2>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- Rekomendasi End -->

    <hr class="line-after-rekomendasi">

    <!-- Dampak Kopi Start -->
    <div class="dampak">
        <div class="container">
            <h3 data-aos="zoom-in-up">TAU KAH KAMU?</h3>
            <h2 data-aos="zoom-in-up">DAMPAK KOPI PADA TUBUH KITA</h2>
            <div class="content">
                <div class="left" data-aos="fade-right">
                    <div class="heading">
                        <h2>Manfaat Minum Kopi</h2>
                    </div>
                    <div class="list-left">
                        <ul>
                            <li>Menjaga Kesehatan Otak</li>
                            <li>Menjaga Kesehatan Otak</li>
                            <li>Menurunkan Risiko Terkena Diabetes Tipe 2</li>
                            <li>Mengurangi Risiko Penyakit Parkinson</li>
                            <li>Menjaga Kesehatan Jantung</li>
                            <li>Mengurangi Risiko Kanker</li>
                            <li>Menjaga Berat Badan Ideal</li>
                        </ul>
                    </div>
                </div>
                <img src="assets/kopi 3d dampak.png" alt="" data-aos="zoom-in-up">
                <div class="right" data-aos="fade-left">
                    <div class="heading">
                        <h2>Bahaya Minum Kopi</h2>
                    </div>
                    <div class="list-right">
                        <ul>
                            <li>Peningkatan Asam Lambung</li>
                            <li>Risiko Kanker kandung kemih dan ovarium</li>
                            <li>Merusak Gigi</li>
                            <li>Melemahkan daya tahan tubuh</li>
                            <li>Peningkatan Asam Lambung</li>
                            <li>Gangguan pencernaan</li>
                            <li>Gelisah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dampak Kopi End -->

    <hr class="line-after-rekomendasi">

    <!-- Monitoring Start -->
    <div class="monitoring">
        <div class="container">
            <div class="header" data-aos="fade-left">
                <p>Yuk, catat KOPinTOUCH yang sudah kamu minum hari ini!</p>
            </div>
            <div class="row1-monitoring">
                <img src="assets/scan qr.png" alt="" data-aos="zoom-in-up">
                <div class="teks" data-aos="fade-right">
                    <h4>Caffe-Ind Mobile Apps</h4>
                    <p>Kamu juga bisa catat konsumsi KOPinTOUCH favoritmu dengan sekali klik!</p>
                    <a href="">Download Now</a>
                </div>
            </div>
            <div class="row2-monitoring">
                <img src="assets/monitoring section.png" alt="" data-aos="zoom-in-up">
                <div class="card" data-aos="fade-left">
                    <div class="teks">
                        <h4>Kamu sudah makan?</h4>
                        <p>Pastikan tubuhmu siap untuk hari yang produktif dengan makanan bergizi. Lalu, nikmati menu kopi favoritmu dari KOPinTOUCH.</p>
                        <a href="http://">Input Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Monitoring End -->

    <hr class="line-after-monitoring">

    <!-- Grafik Start -->
    <div class="graph">
        <div class="container">
            <div class="content">
                <h2 data-aos="zoom-in-up">DIAGRAM HARIAN KONSUMSI KOPI</h2>
                <div class="diagram">
                    <div class="chartKafein" data-aos="fade-right">
                        <canvas id="chartKafein"></canvas>
                    </div>
                    <div class="chartGlukosa" data-aos="fade-left">
                        <canvas id="chartGlukosa"></canvas>
                    </div>
                </div>
                <h2 data-aos="zoom-in-up">GRAFIK MINGGUAN KONSUMSI KOPI</h2>
                <div class="chart" data-aos="fade-up">
                    <canvas id="lineChart"></canvas>
                </div>
                <h2 data-aos="zoom-in-up">RIWAYAT KONSUMSI KOPIMU</h2>
                <div class="summary">
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

                    $counter = 0;

                    foreach ($data as $row) :

                        if ($counter >= 3) {
                            break;
                        }

                        $kopi = getKopiById(empty($row->id_kopi) ? '' : $row->id_kopi);

                        echo '<div class="card" data-aos="zoom-in-up">
                        <div class="content-card">
                            <div class="row-top">
                                <img src="' . $kopi[0]->foto . '" alt="coffee">
                                <div class="desc">
                                    <h4>' . $kopi[0]->nama . '</h4>
                                    <h5>' . date('l, d F Y', strtotime(empty($row->waktu) ? '' : $row->waktu)) . '</h5>
                                    <div class="details">
                                        <ul>
                                            <li>' . (empty($row->quantity) ? '' : $row->quantity) . ' Cup</li>
                                            <li>' . $kopi[0]->penyajian . '</li>
                                            <li>' . (empty($row->sugar) ? '' : $row->sugar) . '</li>                             
                                        </ul>
                                    </div>
                                    <div class="additional">
                                        <p>Additional Ingredients: </p>
                                        <ul>';
                        foreach ($row->bahan_tambahan as $ingredient) {
                            echo '<li>' . $ingredient . '</li>';
                        }
                        echo '</ul>
                                    </div>
                                    <div class="ingredients">
                                        <div class="col1">
                                            <p>Kafein</p>
                                            <p>Glukosa</p>
                                        </div>
                                        <div class="col2">
                                            <p>:</p>
                                            <p>:</p>
                                        </div>
                                        <div class="col3">
                                            <p>' . (empty($row->kafein) ? '0' : $row->kafein) . ' mg</p>
                                            <p>' . (empty($row->glukosa) ? '0' : $row->glukosa) . ' gram</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="date">' . date('H:i', strtotime(empty($row->waktu) ? '' : $row->waktu)) . ' WIB</p>
                        </div>
                    </div>';
                        $counter++;
                    endforeach;
                    ?>
                </div>
                <a href="riwayat_konsumsi.php" data-aos="fade-up" >Lihat selengkapnya</a>
            </div>
        </div>
    </div>
    <!-- Grafik End -->

    <hr class="line-after-grafik">

    <!-- Search Start -->
    <div class="search" data-aos="fade-right">
        <div class="container">
            <div class="card">
                <div class="content-card">
                    <div class="teks">
                        <h3>Temukan Teman di Caffe-Ind yang Menyenangkan!</h3>
                        <p>Kamu dapat mencari pengguna lain untuk berdiskusi, berbagi informasi peringkat, dan bergabung dalam forum diskusi yang seru.</p>
                    </div>
                    <a href="searchUser.php">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->

    <hr class="line-after-search">

    <!-- Caffe-nChat Start -->
    <div class="caffenchat" data-aos="fade-left">
        <div class="container">
            <div class="card">
                <div class="content-card">
                    <div class="teks">
                        <h3>Caffe-nChat</h3>
                        <p>Pengalaman positif akan terjadi disini! Caffe-nChat akan menjadi tempat yang sempurna untuk mendapatkan saran,komunikasi, dan informasi terkini seputar kopi dan cafe KopInTouch.</p>
                    </div>
                    <a href="topik.php">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Caffe-nChat End -->

    <hr class="line-after-caffenchat">

    <!-- Download Start -->
    <div class="download" >
        <div class="container" data-aos="zoom-in-up" data-aos-delay="250">
            <div class="content">
                <div class="left">
                    <div id="carouselDownload" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/mockup_home.png" alt="mockup app" class="mockup">
                                <div class="card">
                                    <p>Rasakan kemudahan monitoring konsumsi KOPinTOUCH-mu sekarang juga dengan Caffe-Ind versi Mobile!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/mockup_input.png" alt="mockup app" class="mockup">
                                <div class="card">
                                    <p>Kopi adalah cerita, dan Caffe-Ind adalah pena. Rasakan dan catat pengalaman kopimu sekarang!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/mockup_scan.png" alt="mockup app" class="mockup">
                                <div class="card">
                                    <p>Kemudahan tercipta pada Caffe-Ind versi mobile. Hanya dengan scan barcode, kopimu langsung terpilih.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/mockup_summary.png" alt="mockup app" class="mockup">
                                <div class="card">
                                    <p>Lihat rangkuman konsumsi KOPinTOUCH-mu setiap hari dan minggunya!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/mockup_topic.png" alt="mockup app" class="mockup">
                                <div class="card">
                                    <p>Tanyakan dan lempar banyak topik menarik perihal kopi di Caffe-nChat</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/mockup_reply.png" alt="mockup app" class="mockup">
                                <div class="card">
                                    <p>Bantu teman lainnya dan bahas lebih dalam topik menarik di sini!</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDownload" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDownload" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselDownload" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#carouselDownload" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#carouselDownload" data-bs-slide-to="2"></button>
                            <button type="button" data-bs-target="#carouselDownload" data-bs-slide-to="3"></button>
                            <button type="button" data-bs-target="#carouselDownload" data-bs-slide-to="4"></button>
                            <button type="button" data-bs-target="#carouselDownload" data-bs-slide-to="5"></button>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <p>Kini saatnya untuk akses Caffe-Ind ke mana pun kamu pergi. Dengan Caffe-Ind Mobile ngopi di KOPinTOUCH no ribet lagi!</p>
                    <h2>DOWNLOAD SEKARANG!</h2>
                    <div class="platform">
                        <a href="#" class="apps-store">
                            <img src="assets/apps store.png" alt="apps store">
                        </a>
                        <a href="#" class="google-play">
                            <img src="assets/google play.png" alt="google play">
                        </a>
                    </div>
                    <div class="buttons">
                        <div class="button-download">
                            <a href="#">Download App</a>
                        </div>
                        <div class="button-pelajari">
                            <a href="#">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Download End -->

    <hr class="line-after-download">

    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="background">
                <div class="content">
                    <div class="header" data-aos="zoom-in-up">
                        <h3>HUBUNGI KAMI</h3>
                        <h2>Kritik dan saran anda akan sangat membantu kami</h2>
                    </div>
                    <div class="informations">
                        <div class="info" data-aos="zoom-in-up">
                            <img src="assets/location.png" alt="location">
                            <h4>Alamat</h4>
                            <p>SCBD</p>
                        </div>
                        <div class="info" data-aos="zoom-in-up">
                            <img src="assets/phone.png" alt="phone">
                            <h4>Nomor Telepon</h4>
                            <p>+62 8123 4567 890</p>
                        </div>
                        <div class="info" data-aos="zoom-in-up">
                            <img src="assets/mail.png" alt="mail">
                            <h4>Email</h4>
                            <p>airin.jaya14@gmail.com</p>
                        </div>
                    </div>
                    <div class="form">
                        <div class="content-left" data-aos="fade-right" data-aos-delay="250">
                            <img src="assets/contact.png" alt="contact">
                        </div>
                        <div class="content-right" data-aos="fade-left" data-aos-delay="250">
                            <form action="postKritikSaran.php" method="get">
                                <div class="input">
                                    <div class="nama">
                                        <input type="text" placeholder="Your Name" name="nama" id="nama">
                                        <input type="hidden" id="id" name="id" value="">
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="email">
                                        <input type="email" placeholder="Your Email Address" name="email" id="email">
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="subject">
                                        <input type="text" placeholder="Subject" name="subjek" id="subjek">
                                    </div>
                                </div>
                                <div class="large-input">
                                    <div class="message">
                                        <textarea placeholder="Your Massage" name="pesan" id="pesan"></textarea>
                                    </div>
                                </div>
                                <button type="submit" id="send">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

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

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>