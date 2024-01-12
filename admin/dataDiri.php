<?php
$username = $_GET['username'];
$password = $_GET['password'];


$cUrl = curl_init();

$options = array(
    CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/verifikasiLoginAdmin?username=' . $username . "&password=" . $password,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_RETURNTRANSFER => true,
);
curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$data = json_decode($response);

curl_close($cUrl);

if (count($data)) {
    // Terdaftar
    $id = $data[0]->_id;
} else {
    // Tidak Terdaftar
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
    <link rel="stylesheet" href="css/dataDiri.css">
    <!-- Library AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Javascript -->
    <script src="js/script.js"></script>
    <script src="js/fillProfilPicture.js"></script>
    <script src="js/aos.js"></script>
</head>

<body>
    <div class="data_diri">
        <div class="container" data-aos="zoom-in-up">
            <div class="card-form">
                <div class="judul-form">
                    <h2>Yuk isi data dirimu min</h2>
                </div>
                <div class="content-form">
                    <div class="form">
                        <img alt="" class="profile-picture-display" src="assets/profile_picture_admin1.png">
                        <form action="saveDataAdmin.php" method="get">
                            <div class="mb-3 input-profilepicture" id="profile_picture">
                                <h4>Pilih Foto Profil</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture_admin1" value="profile_picture_admin1.png" checked>
                                    <img src="assets/profile_picture_admin1.png" alt="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="profile_picture" id="profile_picture_admin2" value="profile_picture_admin2.png">
                                    <img src="assets/profile_picture_admin2.png" alt="">
                                </div>
                            </div>
                            <div class="input">
                                <h4>Nama</h4>
                                <input type="text" placeholder="Masukkan nama kamu" name="nama" id="nama" required>
                                <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
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