<?php
session_start();

// Cek apakah user telah login
if(isset($_SESSION['user_id'])) {
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
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/editProfil.css">
    <!-- Library AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Javascript -->
    <script src="js/script.js"></script>
    <script src="js/fillEditProfil.js"></script>
    <script src="js/validateRegistration.js"></script>
    <script src="js/fillProfilPicture.js"></script>
    <script src="js/aos.js"></script>
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

    <!-- Lihat Profil Start -->
    <div class="editProfil">
        <div class="container">
            <div class="card-form" data-aos="zoom-in-up">
                <div class="judul-form">
                    <h2>Edit Profil</h2>
                </div>
                <div class="form">
                    <img src="assets/<?php echo $profile_picture; ?>" alt="" class="profile-picture-display">
                    <a href="javascript:void(0);" class="ganti-foto-profil">Ganti foto profil</a>
                    <form action="editDataKonsumen.php" method="get" onsubmit="return validateForm()">
                        <div class="mb-3 input-profilepicture" id="profile_picture">
                            <h4>Pilih Foto Profil</h4>
                            <div class="profile-container">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture1" value="profile_picture1.jpg" checked>
                                    <img src="assets/profile_picture1.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture2" value="profile_picture2.jpg">
                                    <img src="assets/profile_picture2.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture3" value="profile_picture3.jpg">
                                    <img src="assets/profile_picture3.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture4" value="profile_picture4.jpg">
                                    <img src="assets/profile_picture4.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture5" value="profile_picture5.jpg">
                                    <img src="assets/profile_picture5.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture6" value="profile_picture6.jpg">
                                    <img src="assets/profile_picture6.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture7" value="profile_picture7.jpg">
                                    <img src="assets/profile_picture7.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture8" value="profile_picture8.jpg">
                                    <img src="assets/profile_picture8.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture9" value="profile_picture9.jpg">
                                    <img src="assets/profile_picture9.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture10" value="profile_picture10.jpg">
                                    <img src="assets/profile_picture10.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture11" value="profile_picture11.jpg">
                                    <img src="assets/profile_picture11.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture12" value="profile_picture12.jpg">
                                    <img src="assets/profile_picture12.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture13" value="profile_picture13.jpg">
                                    <img src="assets/profile_picture13.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture14" value="profile_picture14.jpg">
                                    <img src="assets/profile_picture14.jpg" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture15" value="profile_picture15.jpg">
                                    <img src="assets/profile_picture15.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="input">
                            <h4>Username</h4>
                            <input type="text" placeholder="Masukkan username kamu" name="username" id="username" required>
                            <input type="hidden" id="id" name="id">
                        </div>
                        <div class="input">
                            <h4>Nama</h4>
                            <input type="text" placeholder="Masukkan nama kamu" name="nama" id="nama" required>
                        </div>
                        <div class="input">
                            <h4>Email</h4>
                            <input type="text" placeholder="Masukkan email kamu" name="email" id="email" required>
                        </div>
                        <div class="input">
                            <h4>Nomor HP</h4>
                            <input type="number" placeholder="Masukkan nomor HP kamu" name="nomor_hp" id="nomor_hp" required>
                        </div>
                        <div class="input">
                            <h4>Usia</h4>
                            <input type="number" placeholder="Masukkan usia kamu" name="usia" id="usia" required>
                        </div>
                        <div class="mb-3 input-jeniskelamin">
                            <h4>Jenis Kelamin</h4>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="pria" value="Pria" checked>
                                <label class="form-check-label" for="pria">
                                    Pria
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="wanita" value="Wanita">
                                <label class="form-check-label" for="wanita">
                                    Wanita
                                </label>
                            </div>
                        </div>
                        <div class="input">
                            <h4>Tinggi Badan (cm)</h4>
                            <input type="number" placeholder="Masukkan tinggi badan kamu" name="tinggi_badan" id="tinggi_badan" required>
                        </div>
                        <div class="input">
                            <h4>Berat Badan (kg)</h4>
                            <input type="number" placeholder="Masukkan berat badan kamu" name="berat_badan" id="berat_badan" required>
                        </div>
                        <div class="mb-3 input-statuskehamilan" id="status_kehamilan">
                            <h4>Status Kehamilan</h4>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_kehamilan" id="iya" value="Iya" checked>
                                <label class="form-check-label" for="iya">
                                    Iya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_kehamilan" id="tidak" value="Tidak">
                                <label class="form-check-label" for="tidak">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 input-penyakit">
                            <h4>Riwayat Penyakit</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" id="maag" value="Maag">
                                <label class="form-check-label" for="maag">
                                    Maag
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" id="asamLambung" value="Asam Lambung">
                                <label class="form-check-label" for="asamLambung">
                                    Asam Lambung
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" id="penyakitJantung" value="Penyakit Jantung">
                                <label class="form-check-label" for="penyakitJantung">
                                    Penyakit Jantung
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" id="hipertensi" value="Hipertensi">
                                <label class="form-check-label" for="hipertensi">
                                    Hipertensi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="riwayat_penyakit[]" id="diabetes" value="Diabetes">
                                <label class="form-check-label" for="diabetes">
                                    Diabetes
                                </label>
                            </div>
                        </div>
                        <button type="submit" id="button-edit-profil">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Lihat Profil End -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>