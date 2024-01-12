<?php
$email = $_GET['email'];
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
    <link rel="stylesheet" href="css/dataDiriLoginGoogle.css">
    <!-- Library AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Javascript -->
    <script src="js/script.js"></script>
    <script src="js/fillProfilPicture.js"></script>
    <script src="js/validateUsername.js"></script>
    <script src="js/aos.js"></script>
</head>

<body>
    <div class="data_diri">
        <div class="container" data-aos="zoom-in-up">
            <div class="card-form">
                <div class="judul-form">
                    <h2>Yuk isi data dirimu</h2>
                </div>
                <div class="content-form">
                    <div class="form">
                        <img alt="" class="profile-picture-display" src="assets/profile_picture1.jpg">
                        <form action="saveKonsumenViaGoogle.php" method="get" onsubmit="return validateForm()">
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
                                <input type="text" placeholder="Masukkan nomor Username kamu" name="username" id="username" required>
                            </div>
                            <div class="input">
                                <h4>Nama</h4>
                                <input type="text" placeholder="Masukkan nama kamu" name="nama" id="nama" required>
                                <input type="hidden" id="id" name="id" value="">
                                <input type="hidden" id="email" name="email" value="<?php echo $email ?>">
                                <input type="hidden" id="password" name="password" value="google">
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
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="pria" value="Pria">
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
                            <div class="mb-3 input-statuskehamilan" id="status_kehamilan" style="display:none;">
                                <h4>Status Kehamilan</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_kehamilan" id="iya" value="Iya">
                                    <label class="form-check-label" for="iya">
                                        Iya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_kehamilan" id="tidak" value="Tidak" checked>
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
                            <button type="submit" id="button-data-diri">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>