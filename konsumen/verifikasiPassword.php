<?php
    session_start();

    // Cek apakah user telah login
    if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
        // Mengambil nilai session
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $nama = $_SESSION['nama'];
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

    $input_password = md5($_GET['password']);

    if ($password === $input_password){
        // Konfirmasi Password Berhasil
        header('Location: gantiPasswordSignPasswordBaru.php');

    } else {
        // Konfirmasi Password Gagal
        echo "<script>alert('Password yang Kamu masukkan tidak sesuai. Mohon masukkan kembali password dengan tepat'); window.location.href = 'gantiPasswordSignPasswordLama.php';</script>";
    }    
?>