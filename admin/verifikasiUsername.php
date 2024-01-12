<?php
    session_start();
    
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAdminByUsername?username='.$_GET['username'],
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true,
    );
    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);

    curl_close($cUrl);

    if (count($data)){
        // Username Terdaftar        
        if (isset($data[0]->pertanyaan_lupa_password)) {
            // Redirect ke halaman kuisioner
            header('Location: lupapw_kuisioner.php?id=' . $data[0]->_id);
            exit();
        } else {
            // Tampilkan alert jika kolom 'pertanyaan_lupa_password' tidak ada
            echo "<script>alert('Pengguna ini belum melakukan pengaturan verifikasi lupa password. Mohon maaf proses lupa password tidak dapat dilanjutkan.'); window.location.href = 'login.php';</script>";
        }
    } else {
        // Username Tidak Terdaftar
        echo "<script>alert('Username yang Kamu masukkan tidak terdaftar'); window.location.href = 'lupapw_username.php';</script>";
    }    
?>