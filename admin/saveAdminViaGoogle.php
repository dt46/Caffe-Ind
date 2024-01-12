<?php
$id = $_GET['id'];
$username = $_GET['username'];
$email = $_GET['email'];
$password = $_GET['password'];
$nama = $_GET['nama'];
$profile_picture = $_GET['profile_picture'];
$nomor_hp = $_GET['nomor_hp'];
$usia = $_GET['usia'];
$jenis_kelamin = $_GET['jenis_kelamin'];

$cUrl = curl_init();

$options = array(
    CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/verifikasiUsernameAdmin?username=' . $username,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_RETURNTRANSFER => true,
);
curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$data = json_decode($response);

curl_close($cUrl);

if ($data->isEmpty === true) {
    // Username belum terdaftar
    // Insert
    $url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/registrasiAdminViaGoogle';
    $customrequest = 'POST';

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'username' => $username,
            'email' => $email,
            'password' => md5($password),
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

    $_SESSION['user_id'] = $data[0]->_id;

    header('Location: verifikasiLogin.php?username=' . $username . '&password=' . $password);
} else {
    echo "<script>alert('Username sudah digunakan'); window.location.href = 'dataDiriLoginGoogle.php?email=".$email."';</script>";
}
