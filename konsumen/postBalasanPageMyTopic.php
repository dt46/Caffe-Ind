<?php
date_default_timezone_set('Asia/Jakarta');
$id = $_GET['id'];
$id_topik = $_GET['id_topik'];
$id_pengirim = $_GET['id_pengirim'];
$pesanBalasan = $_GET['pesanBalasan'];
$waktu = date('Y-m-d H:i:s');

$url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/postBalasan';
$customrequest = 'POST';

$cUrl = curl_init();

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => $customrequest,
    CURLOPT_POSTFIELDS => http_build_query(array(
        'id_topik' => $id_topik,
        'id_pengirim' => $id_pengirim,
        'pesanBalasan' => $pesanBalasan,
        'waktu' => $waktu
    )),
);
curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$data = json_decode($response);

curl_close($cUrl);

header('Location: myTopic.php?id='.$id_topik);
?>
