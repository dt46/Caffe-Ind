<?php
$id = $_GET['id'];
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
    <link rel="stylesheet" href="css/lupapw_gantipw.css">
    <!-- Library AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Javascript -->
    <script src="js/validateGantiPassword.js"></script>
    <script src="js/script.js"></script>
    <script src="js/aos.js"></script>
</head>

<body>
    <div class="lupapw">
        <div class="container" data-aos="zoom-in-up">
            <div class="card-form">
                <div class="judul-form">
                    <h2>Lupa Password</h2>
                    <p>Verifikasi Identitas berhasil, silakan atur ulang password kamu</p>
                </div>
                <div class="content-form">
                    <div class="form">
                        <form action="saveLupaPassword.php" method="get" onsubmit="return validateForm()">
                            <div class="input">
                                <h4>Masukkan password Kamu yang baru</h4>
                                <input type="password" placeholder="Password" name="password" id="password" required>
                                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                            </div>
                            <div class="aturanPassword">
                                <p>Buat password yang berisi 8 karakter, password yang kuat adalah kombinansi huruf, angka, dan tanda baca.</p>
                            </div>
                            <div class="input">
                                <h4>Verifikasi password Kamu</h4>
                                <input type="password" placeholder="Verifikasi Password" name="verifikasiPassword" id="verifikasiPassword" required>
                            </div>
                            <button type="submit" id="button-ganti-password">Perbarui</button>
                        </form>
                    </div>
                    <p>Sudah ingat password kamu? <a href="login.php" class="login">Login disini</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>