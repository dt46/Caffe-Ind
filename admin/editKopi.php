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

    $id_kopi = $_GET['id'];
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
    <link rel="stylesheet" href="css/editKopi.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Javascript -->
    <script src="js/script.js"></script>
    <script src="js/fillEditKopi.js"></script>
    <script src="js/fillCoffeePicture.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                        <a class="nav-link active" href="kopi.php">Caffe-Tracker</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="caffenchat.php">Caffe-nChat</a>
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

    <!-- Profil Kopi Start -->
    <div class="kopi">
        <img src="assets/bg_3d_kopi_kanan.png" alt="" class="top-right">
        <div class="container">
            <div class="card-kopi">
                <div class="content-card">
                    <div class="header">
                        <a href="lihatKopi.php?id=<?php echo $id_kopi; ?>">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                        <h1>Edit Data Kopi</h1>
                    </div>
                    <div class="form">
                        <img src="assets/coffee 3d.png" alt="" class="picture-kopi">
                        <form action="saveKopi.php" method="get">
                            <div class="input">
                                <h4>Foto Menu Kopi</h4>
                                <input type="text" placeholder="Masukkan url foto menu kopi" name="foto" id="foto">
                            </div>
                            <div class="input">
                                <h4>Nama Menu Kopi</h4>
                                <input type="text" placeholder="Masukkan nama menu kopi" name="nama" id="nama">
                                <input type="hidden" id="id" name="id">
                            </div>
                            <div class="input">
                                <h4>Deskripsi Menu Kopi</h4>
                                <textarea type="text" placeholder="Masukkan deskripsi menu kopi" name="deskripsi" id="deskripsi" required></textarea>
                            </div>
                            <div class="mb-3 input-jenispenyajian">
                                <h4>Jenis Penyajian Kopi</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="penyajian" id="hot" value="Hot" checked>
                                    <label class="form-check-label" for="hot">
                                        Hot
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="penyajian" id="cold" value="Cold">
                                    <label class="form-check-label" for="cold">
                                        Cold
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 input-jenisbijikopi">
                                <h4>Jenis Biji Kopi</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="biji_kopi" id="robusta" value="Robusta" checked>
                                    <label class="form-check-label" for="robusta">
                                        Robusta
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="biji_kopi" id="arabica" value="Arabica">
                                    <label class="form-check-label" for="arabica">
                                        Arabica
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="biji_kopi" id="house_blend" value="House Blend">
                                    <label class="form-check-label" for="house_blend">
                                        House Blend
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 input-teknikpenyeduhan">
                                <h4>Teknik Penyeduhan Kopi</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="penyeduhan_kopi" id="espresso" value="Espresso" checked>
                                    <label class="form-check-label" for="espresso">
                                        Espresso
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="penyeduhan_kopi" id="brew" value="Brew">
                                    <label class="form-check-label" for="brew">
                                        Brew
                                    </label>
                                </div>
                            </div>
                            <div class="input">
                                <h4>Takaran Kopi (ml)</h4>
                                <input type="number" placeholder="Masukkan takaran kopi" name="kopi" id="kopi">
                            </div>
                            <div class="input">
                                <h4>Takaran Gula (ml)</h4>
                                <div class="detail">
                                    <p>Less Sugar</p>
                                    <input type="number" placeholder="Masukkan Takaran Less Sugar" name="less_sugar" id="less_sugar">
                                </div>
                                <div class="detail">
                                    <p>Normal Sugar</p>
                                    <input type="number" placeholder="Masukkan Takaran Normal Sugar" name="normal_sugar" id="normal_sugar">
                                </div>
                                <div class="detail">
                                    <p>Extra Sugar</p>
                                    <input type="number" placeholder="Masukkan Takaran Extra Sugar" name="extra_sugar" id="extra_sugar">
                                </div>
                            </div>
                            <div class="mb-3 input-bahantambahan">
                                <h4>Bahan Tambahan</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="bahan_tambahan" id="cokelat" value="Cokelat" onchange="toggleInput('cokelat')">
                                    <label class="form-check-label" for="cokelat">
                                        Cokelat
                                    </label>
                                    <input type="number" placeholder="Masukkan Takaran Cokelat (gram)" name="takaranCokelat" id="takaranCokelat">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="bahan_tambahan" id="matcha" value="Matcha" onchange="toggleInput('matcha')">
                                    <label class="form-check-label" for="matcha">
                                        Matcha
                                    </label>
                                    <input type="number" placeholder="Masukkan Takaran Matcha (gram)" name="takaranMatcha" id="takaranMatcha">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="bahan_tambahan" id="icecream" value="Ice Cream" onchange="toggleInput('icecream')">
                                    <label class="form-check-label" for="icecream">
                                        Ice Cream
                                    </label>
                                    <input type="number" placeholder="Masukkan Takaran Ice Cream (scope)" name="takaranIcecream" id="takaranIcecream">
                                </div>
                            </div>
                            <button type="submit" id="button-submit-kopi">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <img src="assets/bg_3d_kopi_kiri.png" alt="" class="bottom-left">
    </div>
    <!-- Profil Kopi End -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>