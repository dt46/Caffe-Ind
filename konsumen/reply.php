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
    $id_topik = $_GET['id'];
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
    <link rel="stylesheet" href="css/reply.css">
    <!-- Library AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Javascript -->
    <script src="js/script.js"></script>
    <script src="js/popupReport.js"></script>
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
                        <a class="nav-link" href="input.php">Caffe-Tracker</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link active" aria-current="page" href="topik.php">Caffe-nChat</a>
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
        <div class="container">
            <div class="left" data-aos="zoom-in-up">
                <div class="glass">
                    <div class="profile">
                        <img src="assets/<?php echo $profile_picture; ?>" alt="" class="profile-picture">
                        <div class="teks-profile">
                            <h4><?php echo $nama; ?></h4>
                            <h5><?php echo $username; ?></h5>
                        </div>
                    </div>
                    <div class="option">
                        <a href="history.php" class="history">
                            <i class="fa-solid fa-comments"></i>
                            <p>History</p>
                        </a>
                        <a href="topik.php" class="fyd">
                            <i class="fa-solid fa-comment-dots"></i>
                            <p>For Your Discuss</p>
                        </a>
                    </div>
                    <div class="last-post">
                        <h4>Your last post</h4>
                        <div class="content-lastpost">
                            <?php
                            function getJumlahBalasan($id_topik)
                            {
                                $cUrl = curl_init();

                                $options = array(
                                    CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getBalasanByTopik?id_topik=' . $id_topik,
                                    CURLOPT_CUSTOMREQUEST => 'GET',
                                    CURLOPT_RETURNTRANSFER => true
                                );

                                curl_setopt_array($cUrl, $options);

                                $response = curl_exec($cUrl);

                                $balasan = json_decode($response);

                                curl_close($cUrl);

                                return count($balasan);
                            }

                            $cUrl = curl_init();

                            $options = array(
                                CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllTopikByIdPengirim?id_pengirim=' . $user_id,
                                CURLOPT_CUSTOMREQUEST => 'GET',
                                CURLOPT_RETURNTRANSFER => true
                            );

                            curl_setopt_array($cUrl, $options);

                            $response = curl_exec($cUrl);

                            $data = json_decode($response);

                            curl_close($cUrl);

                            $counter = 0;
                            foreach ($data as $row) :

                                if ($counter >= 3) {
                                    break;
                                }

                                // Mendapatkan jumlah balasan
                                $jumlah_balasan = getJumlahBalasan(empty($row->_id) ? '' : $row->_id);

                                // Menampilkan topik riwayat postingan user
                                echo '<a href="myTopic.php?id=' . (empty($row->_id) ? '' : $row->_id) . '" class="post-lastpost">
                                        <div class="top-post">
                                            <p>' . (empty($row->pesanTopik) ? '' : $row->pesanTopik) . '</p>
                                        </div>
                                        <div class="bot-post">
                                            <p>' . $jumlah_balasan . ' Balasan</p>
                                            <p>' . (empty($row->waktu) ? '' : $row->waktu) . ' WIB</p>
                                        </div>
                                    </a>';

                                $counter++;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top">
                <div class="profile">
                    <img src="assets/<?php echo $profile_picture; ?>" alt="" class="profile-picture">
                    <div class="teks-profile">
                        <h4><?php echo $nama; ?></h4>
                        <h5><?php echo $username; ?></h5>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>
                  
                    <ul class="dropdown-menu">
                      <li><a href="history.php" class="history">
                                <i class="fa-solid fa-comments"></i>
                                <p>History</p>                        
                            </a>
                        </li>
                      <li>
                        <a href="topik.php" class="fyd">
                            <i class="fa-solid fa-comment-dots"></i>
                            <p>For Your Discuss</p>                        
                        </a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="right" data-aos="zoom-in-up">
                <div class="glass">
                    <div class="diskusi">
                        <?php
                        function getKonsumenById($id_pengirim)
                        {
                            $cUrl = curl_init();

                            $options = array(
                                CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKonsumenById?id=' . $id_pengirim,
                                CURLOPT_CUSTOMREQUEST => 'GET',
                                CURLOPT_RETURNTRANSFER => true
                            );

                            curl_setopt_array($cUrl, $options);

                            $response = curl_exec($cUrl);

                            $konsumen = json_decode($response);

                            curl_close($cUrl);

                            return $konsumen;
                        }

                        $cUrl = curl_init();

                        $options = array(
                            CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getTopikById?id=' . $id_topik,
                            CURLOPT_CUSTOMREQUEST => 'GET',
                            CURLOPT_RETURNTRANSFER => true
                        );

                        curl_setopt_array($cUrl, $options);

                        $response = curl_exec($cUrl);

                        $data = json_decode($response);

                        curl_close($cUrl);

                        $konsumen = getKonsumenById(empty($data[0]->id_pengirim) ? '' : $data[0]->id_pengirim);

                        $jumlah_balasan = getJumlahBalasan($id_topik);

                        ?>
                        <div class="profil-report">
                            <div class="profil">
                                <img src="assets/<?php echo $konsumen[0]->profile_picture; ?>" alt="" class="profile-picture">
                                <div class="akun">
                                    <h3><?php echo $konsumen[0]->nama; ?></h3>
                                    <h4><?php echo $konsumen[0]->username; ?></h4>
                                </div>
                            </div>
                            <img src="assets/report.png" alt="" class="report" onclick="showReportPopupTopik()">
                        </div>
                        <div class="teks-topic">
                            <h4><?php echo $data[0]->pesanTopik; ?></h4>
                            <div class="info-topic">
                                <p><?php echo $jumlah_balasan; ?> Balasan</p>
                                <p><?php echo $data[0]->waktu; ?> WIB</p>
                            </div>
                        </div>
                        <div class="replies">
                            <?php
                            $cUrl = curl_init();

                            $options = array(
                                CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getBalasanByTopik?id_topik=' . $id_topik,
                                CURLOPT_CUSTOMREQUEST => 'GET',
                                CURLOPT_RETURNTRANSFER => true
                            );

                            curl_setopt_array($cUrl, $options);

                            $response = curl_exec($cUrl);

                            $data = json_decode($response);

                            curl_close($cUrl);
                            foreach ($data as $row) :
                                // Mendapatkan informasi konsumen berdasarkan id_pengirim
                                $konsumen = getKonsumenById(empty($row->id_pengirim) ? '' : $row->id_pengirim);
                            
                                // Menampilkan topik dengan informasi konsumen
                                echo '<div class="reply">
                                    <div class="profil-report">';
                                // Tambahkan kondisi untuk mengecek apakah id konsumen sama dengan id session
                                if ($konsumen[0]->_id === $user_id) {
                                    // Jika id konsumen sama dengan id session, tidak menampilkan ikon report
                                    echo '<div class="profil">
                                            <img src="assets/' . $konsumen[0]->profile_picture . '" alt="" class="profile-reply">
                                            <div class="akun">
                                                <h3>' . $konsumen[0]->nama . '</h3>
                                                <h4>' . $konsumen[0]->username . '</h4>
                                            </div>
                                        </div>';
                                } else {
                                    // Jika id konsumen tidak sama dengan id session, tampilkan ikon report
                                    echo '<div class="profil">
                                            <img src="assets/' . $konsumen[0]->profile_picture . '" alt="" class="profile-reply">
                                            <div class="akun">
                                                <h3>' . $konsumen[0]->nama . '</h3>
                                                <h4>' . $konsumen[0]->username . '</h4>
                                            </div>
                                        </div>
                                        <img src="assets/report.png" alt="" class="report" onclick="showReportPopupBalasan(\'' . (empty($row->_id) ? '' : $row->_id) . '\')">';
                                }
                                echo '</div>
                                    <div class="teks-reply">
                                        <h4>' . (empty($row->pesanBalasan) ? '' : $row->pesanBalasan) . '</h4>
                                        <p class="date">' . (empty($row->waktu) ? '' : $row->waktu) . ' WIB</p>
                                    </div>
                                </div>';
                            endforeach;
                            ?>
                        </div>
                        <form action="postBalasanPageReply.php" method="get">
                            <div class="inputField-reply">
                                <input type="text" placeholder="Ketikkan balasanmu disini" name="pesanBalasan" id="pesanBalasan">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="id_topik" name="id_topik" value="<?php echo $id_topik ?>">
                                <input type="hidden" id="id_pengirim" name="id_pengirim" value="<?php echo $user_id ?>">
                                <button type="submit" id="button-send">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        <div id="reportPopupTopik" class="popup">
            <div class="popup-content">
                <img src="assets/bg_3d_kopi_kanan.png" alt="" class="bg">
                <img src="assets/menuLaporan.png" alt="" class="ilustrasi">
                <form action="postReportTopik.php" method="get">
                    <div class="mb-3 input-alasanreport">
                        <h4>Berikan alasan kamu melaporkan pesan ini</h4>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="id_topik" name="id_topik" value="<?php echo $id_topik; ?>">
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="ujaran_simbol_kebencian_topik" value="Ujaran dan simbol kebencian">
                            <label class="form-check-label" for="ujaran_simbol_kebencian_topik">Ujaran dan simbol kebencian</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="informasi_palsu_topik" value="Informasi palsu">
                            <label class="form-check-label" for="informasi_palsu_topik">Informasi palsu</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="tidak_bahas_kopi_topik" value="Pesan tidak membahas topik kopi">
                            <label class="form-check-label" for="tidak_bahas_kopi_topik">Pesan tidak membahas topik kopi</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="tidak_suka_topik" value="Saya hanya tidak menyukainya">
                            <label class="form-check-label" for="tidak_suka_topik">Saya hanya tidak menyukainya</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="bullying_topik" value="Perundungan (Bullying)">
                            <label class="form-check-label" for="bullying_topik">Perundungan (Bullying)</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="kata_kasar_topik" value="Menggunakan kata kasar">
                            <label class="form-check-label" for="kata_kasar_topik">Menggunakan kata kasar</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="diluar_konteks_topik" value="Pesan diluar konteks diskusi">
                            <label class="form-check-label" for="diluar_konteks_topik">Pesan diluar konteks diskusi</label>
                        </div>
                    </div>
                    <button type="submit" id="button-send">Kirim</button>
                </form>
            </div>
        </div>

        <div id="reportPopupBalasan" class="popup">
            <div class="popup-content">
                <img src="assets/bg_3d_kopi_kanan.png" alt="" class="bg">
                <img src="assets/menuLaporan.png" alt="" class="ilustrasi">
                <form action="postReportBalasan.php" method="get">
                    <div class="mb-3 input-alasanreport">
                        <h4>Berikan alasan kamu melaporkan pesan ini</h4>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="id_topik" name="id_topik" value="<?php echo $id_topik; ?>">
                        <input type="hidden" id="id_balasan" name="id_balasan" value="">
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="ujaran_simbol_kebencian_balasan" value="Ujaran dan simbol kebencian">
                            <label class="form-check-label" for="ujaran_simbol_kebencian_balasan">Ujaran dan simbol kebencian</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="informasi_palsu_balasan" value="Informasi palsu">
                            <label class="form-check-label" for="informasi_palsu_balasan">Informasi palsu</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="tidak_bahas_kopi_balasan" value="Pesan tidak membahas topik kopi">
                            <label class="form-check-label" for="tidak_bahas_kopi_balasan">Pesan tidak membahas topik kopi</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="tidak_suka_balasan" value="Saya hanya tidak menyukainya">
                            <label class="form-check-label" for="tidak_suka_balasan">Saya hanya tidak menyukainya</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="bullying_balasan" value="Perundungan (Bullying)">
                            <label class="form-check-label" for="bullying_balasan">Perundungan (Bullying)</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="kata_kasar_balasan" value="Menggunakan kata kasar">
                            <label class="form-check-label" for="kata_kasar_balasan">Menggunakan kata kasar</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="radio" name="alasan_report" id="diluar_konteks_balasan" value="Pesan diluar konteks diskusi">
                            <label class="form-check-label" for="diluar_konteks_balasan">Pesan diluar konteks diskusi</label>
                        </div>
                    </div>
                    <button type="submit" id="button-send">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Landing Page End -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>