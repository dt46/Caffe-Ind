<?php
date_default_timezone_set('Asia/Jakarta');
$id = $_GET['id'];
$id_topik = $_GET['id_topik'];
$id_balasan = $_GET['id_balasan'];
$alasan_report = $_GET['alasan_report'];
$waktu = date('Y-m-d H:i:s');

$url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/postReportBalasan';
$customrequest = 'POST';

$cUrl = curl_init();

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => $customrequest,
    CURLOPT_POSTFIELDS => http_build_query(array(
        'id_balasan' => $id_balasan,
        'alasan_report' => $alasan_report,
        'waktu' => $waktu
    )),
);
curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$data = json_decode($response);

curl_close($cUrl);

header('Location: reply.php?id='.$id_topik);
?>
