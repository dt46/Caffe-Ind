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
    <link rel="stylesheet" href="css/menu.css">
    <!-- Library AOS -->
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Javascript -->
    <script src="js/script.js"></script>
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
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link active" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="konsumen/login.php">Caffe-Tracker</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="konsumen/login.php">Caffe-nChat</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-button" href="konsumen/login.php">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav End -->

    <!-- Menu Start -->
    <div class="menu">
        <div class="container">
            <h3>Menu Kopi KOPinTOUCH</h3>
            <div class="cards-menu">
                <?php
                $cUrl = curl_init();

                $options = array(
                    CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllKopi',
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_RETURNTRANSFER => true
                );

                curl_setopt_array($cUrl, $options);

                $response = curl_exec($cUrl);

                $data = json_decode($response);

                curl_close($cUrl);

                // Inisialisasi array untuk melacak nama-nama yang sudah ditampilkan
                $namaSudahDitampilkan = array();

                foreach ($data as $row) {
                    // Periksa apakah nama sudah ditampilkan sebelumnya
                    if (!in_array($row->nama, $namaSudahDitampilkan)) {
                        echo '<div class="card-menu" data-aos="zoom-in-up">
                                <div class="content-card">
                                    <img src="' . (empty($row->foto) ? '' : $row->foto) . '" alt="">
                                    <div class="teks">
                                        <h4>' . (empty($row->nama) ? '' : $row->nama) . '</h4>
                                        <p>' . (empty($row->deskripsi) ? '' : $row->deskripsi) . '</p>
                                    </div>
                                </div>
                            </div>';

                        // Tambahkan nama ke array untuk menandai bahwa sudah ditampilkan
                        $namaSudahDitampilkan[] = $row->nama;
                    }
                }
                ?>


            </div>
        </div>
    </div>
    <!-- Menu End -->

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

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>