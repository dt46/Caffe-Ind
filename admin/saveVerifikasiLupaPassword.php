<?php
$id = $_GET['id'];
$pertanyaan_lupa_password = $_GET['pertanyaan_lupa_password'];
$jawaban_lupa_password = $_GET['jawaban_lupa_password'];

$url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/settingVerifikasiLupaPasswordAdmin?id='.$id;
$customrequest = 'PUT';

$cUrl = curl_init();

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => $customrequest,
    CURLOPT_POSTFIELDS => http_build_query(array(
        'pertanyaan_lupa_password' => $pertanyaan_lupa_password,
        'jawaban_lupa_password' => $jawaban_lupa_password
    )),
);
curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$data = json_decode($response);

curl_close($cUrl);

header('Location: adminpage.php');
?>
