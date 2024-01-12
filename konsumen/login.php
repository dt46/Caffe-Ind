<?php
//start session
session_start();
require_once 'config.php';

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // getting user profile
    $gauth = new Google_Service_Oauth2($client);
    $google_info = $gauth->userinfo->get();

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKonsumenByEmail?email=' . $google_info->email,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true,
    );
    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);

    curl_close($cUrl);

    if (count($data)) {
        // Terdaftar        
        $_SESSION['user_id'] = $data[0]->_id;
        header('Location: userpage.php');
    } else {
        // Tidak Terdaftar
        header('Location: dataDiriLoginGoogle.php?email=' . $google_info->email);
    }
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
    <link rel="stylesheet" href="css/login.css">
    <!-- Library AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Javascript -->
    <script src="js/script.js"></script>
    <script src="js/aos.js"></script>
</head>

<body>
    <div class="login">
        <div class="container" data-aos="zoom-in-up">
            <div class="card-form">
                <div class="judul-form">
                    <h2>Sign In</h2>
                    <p>Masuk sebagai Admin? <a href="../admin/login.php">Klik disini</a></p>
                </div>
                <div class="content-form">
                    <div class="form">
                        <form action="verifikasiLogin.php" method="get">
                            <div class="input">
                                <div class="username">
                                    <img src="assets/username.png" alt="">
                                    <input type="text" placeholder="Username" name="username" id="username" required>
                                </div>
                            </div>
                            <div class="input">
                                <div class="password">
                                    <img src="assets/password.png" alt="">
                                    <input type="password" placeholder="Password" name="password" id="password" required>
                                </div>
                            </div>
                            <a href="lupapw_username.php">Forgot Password</a>
                            <button type="submit" id="button-login">Login</button>
                        </form>
                    </div>
                    <div class="or">
                        <hr>
                        <p>OR</p>
                        <hr>
                    </div>
                    <a href="<?= $client->createAuthUrl() ?>">
                        <div class="button-google">
                            <img src="assets/Google logo.png" alt="">
                            <p>Login via Google</p>
                        </div>
                    </a>
                    <p>Belum punya akun? <a href="registrasi.php" class="register">Daftar disini</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>