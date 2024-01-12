<?php
    $id = $_GET['id'];
    $cUrl = curl_init();
    $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/deleteBalasanById?id='.$id,
        CURLOPT_CUSTOMREQUEST => 'DELETE'
    );
    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);

    header('Location: laporanPesan.php')
?>