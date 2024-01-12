<?php
$id = $_GET['id'];
$nama = $_GET['nama'];
$profile_picture = $_GET['profile_picture'];
$nomor_hp = $_GET['nomor_hp'];
$usia = $_GET['usia'];
$jenis_kelamin = $_GET['jenis_kelamin'];
$tinggi_badan = $_GET['tinggi_badan'];
$berat_badan = $_GET['berat_badan'];
$status_kehamilan = $_GET['status_kehamilan'];
$riwayat_penyakit = isset($_GET['riwayat_penyakit']) ? implode(',', $_GET['riwayat_penyakit']) : '';

$url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/insertDataDiriKonsumen?id='.$id;
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

header('Location: login.php');
?>
