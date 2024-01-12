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
    <link rel="stylesheet" href="css/topik.css">
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
                        <a href="" class="post-topic">
                            <i class="fa-solid fa-paper-plane"></i>
                            <p>Posting Topik</p>
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
                                            <p>' . (empty($row->waktu) ? '' : $row->waktu) . ' WIB </p>
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
                        <a href="" class="post-topic-responsive">
                            <i class="fa-solid fa-paper-plane"></i>
                            <p>Post Topik Diskusi</p>                        
                        </a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="right" data-aos="zoom-in-up">
                <div class="glass">
                    <div class="for-your-discuss">
                        <h3 class="header-right">For Your Discuss</h3>
                        <div class="topics">
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
                                CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllTopik',
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

                                // Mendapatkan jumlah balasan
                                $jumlah_balasan = getJumlahBalasan(empty($row->_id) ? '' : $row->_id);

                                $pengirimTopik = (empty($row->id_pengirim) ? '' : $row->id_pengirim);

                                // Menampilkan topik dengan informasi konsumen
                                $topicLink = (empty($row->_id) ? '' : $row->_id);

                                // Check if the _id matches user_id
                                if ($pengirimTopik === $user_id) {
                                    $topicLink = 'myTopic.php?id=' . $topicLink;
                                } else {
                                    $topicLink = 'reply.php?id=' . $topicLink;
                                }

                                // Menampilkan topik dengan informasi konsumen
                                echo '<a href="' . $topicLink . '" class="topic">
                                        <div class="top-topic">
                                            <img src="assets/' . $konsumen[0]->profile_picture . '" alt="" class="profile-picture">
                                            <div class="text-top">
                                                <h5>' . $konsumen[0]->nama . '</h5>
                                                <h4>' . (empty($row->pesanTopik) ? '' : $row->pesanTopik) . '</h4>
                                            </div>                                            
                                        </div>
                                        <div class="bot-topic">
                                            <p>' . $jumlah_balasan . ' Balasan</p>
                                            <p>' . (empty($row->waktu) ? '' : $row->waktu) . ' WIB</p>
                                        </div>
                                      </a>';
                            endforeach;
                            ?>
                        </div>
                        <form action="postTopik.php" method="get">
                            <div class="inputField-topic">
                                <div class="button-close">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <input type="text" placeholder="Ketikkan topik diskusimu disini" name="pesanTopik" id="pesanTopik">
                                <input type="hidden" id="id" name="id">
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
    </div>
    <!-- Landing Page End -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>