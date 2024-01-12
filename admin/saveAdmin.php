<?php
$id = $_GET['id'];
$username = $_GET['username'];
$email = $_GET['email'];
$password = $_GET['password'];

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
    $url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/registrasiAdmin';
    $customrequest = 'POST';

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'username' => $username,
            'email' => $email,
            'password' => md5($password),
        )),
    );
    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);

    curl_close($cUrl);

    header('Location: dataDiri.php?username=' . $username . '&password=' . md5($password));

} else {
    echo "<script>alert('Username sudah digunakan'); window.location.href = 'registrasi.php';</script>";
}
?>
