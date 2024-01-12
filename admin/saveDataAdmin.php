<?php
$id = $_GET['id'];
$nama = $_GET['nama'];
$profile_picture = $_GET['profile_picture'];
$nomor_hp = $_GET['nomor_hp'];
$usia = $_GET['usia'];
$jenis_kelamin = $_GET['jenis_kelamin'];

$url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/insertDataDiriAdmin?id='.$id;
$customrequest = 'PUT';

$cUrl = curl_init();

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => $customrequest,
    CURLOPT_POSTFIELDS => http_build_query(array(
        'nama' => $nama,
        'profile_picture' => $profile_picture,
        'nomor_hp' => $nomor_hp,
        'usia' => $usia,
        'jenis_kelamin' => $jenis_kelamin
    )),
);
curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$data = json_decode($response);

curl_close($cUrl);

header('Location: login.php');
?>
