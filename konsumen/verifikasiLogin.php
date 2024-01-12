<?php
    session_start();
    
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/verifikasiLoginKonsumen?username='.$_GET['username']."&password=".md5($_GET['password']),
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true,
    );
    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);

    curl_close($cUrl);

    if (count($data)){
        // Terdaftar        
        $_SESSION['user_id'] = $data[0]->_id;

    } else {
        // Tidak Terdaftar
    }

    header('Location: userpage.php')
?>