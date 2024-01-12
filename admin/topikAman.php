<?php
    $id_topik = $_GET['id_topik'];
    $cUrl = curl_init();
    $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/deleteReportTopikByIdTopik?id_topik='.$id_topik,
        CURLOPT_CUSTOMREQUEST => 'DELETE'
    );
    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);

    header('Location: laporanPesan.php')
?>