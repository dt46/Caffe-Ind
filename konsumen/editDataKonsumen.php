<?php
    session_start();

    $id = $_GET['id'];
    $username = $_GET['username'];
    $nama = $_GET['nama'];
    $email = $_GET['email'];
    $profile_picture = $_GET['profile_picture'];
    $nomor_hp = $_GET['nomor_hp'];
    $usia = $_GET['usia'];
    $jenis_kelamin = $_GET['jenis_kelamin'];
    $tinggi_badan = $_GET['tinggi_badan'];
    $berat_badan = $_GET['berat_badan'];
    $status_kehamilan = $_GET['status_kehamilan'];
    $riwayat_penyakit = isset($_GET['riwayat_penyakit']) ? implode(',', $_GET['riwayat_penyakit']) : '';

    $currentUsername = $_SESSION['username'];    

    // Memeriksa apakah pengguna melakukan penggantian username
    if ($username !== $currentUsername) {
        // Lakukan pemeriksaan ketersediaan username
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/verifikasiUsernameKonsumen?username=' . $username,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true,
        );
        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode($response);

        curl_close($cUrl);

        if ($data->isEmpty === true) {
            // Username belum terdaftar
            $url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/updateProfilKonsumen?id=' . $id;
            $customrequest = 'PUT';
    
            $cUrl = curl_init();
    
            $options = array(
                CURLOPT_URL => $url,
                CURLOPT_CUSTOMREQUEST => $customrequest,
                CURLOPT_POSTFIELDS => http_build_query(array(
                    'username' => $username,
                    'nama' => $nama,
                    'email' => $email,
                    'profile_picture' => $profile_picture,
                    'nomor_hp' => $nomor_hp,
                    'usia' => $usia,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tinggi_badan' => $tinggi_badan,
                    'berat_badan' => $berat_badan,
                    'status_kehamilan' => $status_kehamilan,
                    'riwayat_penyakit' => $riwayat_penyakit
                )),
            );
            curl_setopt_array($cUrl, $options);
    
            $response = curl_exec($cUrl);
    
            $data = json_decode($response);
    
            curl_close($cUrl);
    
            header('Location: userpage.php');
    
        } else {
            echo "<script>alert('Username sudah digunakan'); window.location.href = 'editProfil.php?id=". $id ."';</script>";
        }
    }

    // Melakukan update ketika username tidak dilakukan diperbarui
    $url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/updateProfilKonsumen?id=' . $id;
    $customrequest = 'PUT';

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'username' => $username,
            'nama' => $nama,
            'email' => $email,
            'profile_picture' => $profile_picture,
            'nomor_hp' => $nomor_hp,
            'usia' => $usia,
            'jenis_kelamin' => $jenis_kelamin,
            'tinggi_badan' => $tinggi_badan,
            'berat_badan' => $berat_badan,
            'status_kehamilan' => $status_kehamilan,
            'riwayat_penyakit' => $riwayat_penyakit
        )),
    );
    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);

    curl_close($cUrl);

    header('Location: userpage.php');    
?>
