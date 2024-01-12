<?php
date_default_timezone_set('Asia/Jakarta');
$id = $_GET['id'];
$id_pengirim = $_GET['id_pengirim'];
$pesanTopik = $_GET['pesanTopik'];
$waktu = date('Y-m-d H:i:s');

$url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/postTopik';
$customrequest = 'POST';

$cUrl = curl_init();

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => $customrequest,
    CURLOPT_POSTFIELDS => http_build_query(array(
        'id_pengirim' => $id_pengirim,
        'pesanTopik' => $pesanTopik,
        'waktu' => $waktu
    )),
);
curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$data = json_decode($response);

curl_close($cUrl);

header('Location: topik.php');
?>
