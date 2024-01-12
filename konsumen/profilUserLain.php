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
    $id_konsumen = $_GET['id'];
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
    <link rel="stylesheet" href="css/profilUserLain.css">
    <!-- Javascript -->
    <script src="js/script.js"></script>
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

    <!-- Profil User Lain Start -->
    <div class="userLain">
        <div class="container">
            <div class="card-user">
                <div class="content-card">
                    <div class="header">
                        <a href="searchUser.php">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                        <img src="assets/Logo Caffe-Ind Merah.png" alt="">
                        <div class="space"></div>
                    </div>
                    <div class="content-userLain">
                        <?php
                        $cUrl = curl_init();

                        $options = array(
                            CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKonsumenById?id=' . $id_konsumen,
                            CURLOPT_CUSTOMREQUEST => 'GET',
                            CURLOPT_RETURNTRANSFER => true
                        );

                        curl_setopt_array($cUrl, $options);

                        $response = curl_exec($cUrl);

                        $data = json_decode($response);

                        curl_close($cUrl);
                        ?>
                        <div class="col-user" id="col-profil">
                            <div class="profil">
                                <h2><?php echo $data[0]->nama; ?></h2>
                                <h3><?php echo $data[0]->username; ?></h3>
                                <img src="assets/<?php echo $data[0]->profile_picture; ?>" alt="" class="profile-picture">
                            </div>
                        </div>
                        <div class="col-user" id="col-topic">
                            <h5>Riwayat Posting Topik Diskusi</h5>
                            <div class="topics">
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

                                    if ($row->id_pengirim === $id_konsumen) {

                                    // Mendapatkan informasi konsumen berdasarkan id_pengirim
                                    $konsumen = getKonsumenById(empty($row->id_pengirim) ? '' : $row->id_pengirim);

                                    // Mendapatkan jumlah balasan
                                    $jumlah_balasan = getJumlahBalasan(empty($row->_id) ? '' : $row->_id);

                                    // Menampilkan topik dengan informasi konsumen
                                    echo '<a href="reply.php?id=' . (empty($row->_id) ? '' : $row->_id) . '" class="topic">
                                            <div class="profil-user">
                                                <img src="assets/' . $konsumen[0]->profile_picture . '" alt="" class="profile-topic">
                                                <div class="akun">
                                                    <h3>' . $konsumen[0]->nama . '</h3>
                                                    <h4>' . $konsumen[0]->username . '</h4>
                                                </div>
                                            </div>
                                            <div class="teks-topic">
                                                <h4>' . (empty($row->pesanTopik) ? '' : $row->pesanTopik) . '</h4>
                                                <div class="info-topic">
                                                    <p>' . $jumlah_balasan . ' Balasan</p>
                                                    <p>' . (empty($row->waktu) ? '' : $row->waktu) . ' WIB</p>
                                                </div>
                                            </div>
                                        </a>';
                                    }
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profil User Lain End -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>