<?php
$id = $_GET['id'];
$foto = $_GET['foto'];
$nama = $_GET['nama'];
$deskripsi = $_GET['deskripsi'];
$penyajian = $_GET['penyajian'];
$biji_kopi = $_GET['biji_kopi'];
$penyeduhan_kopi = $_GET['penyeduhan_kopi'];
$kopi = $_GET['kopi'];
$less_sugar = $_GET['less_sugar'];
$normal_sugar = $_GET['normal_sugar'];
$extra_sugar = $_GET['extra_sugar'];
$bahan_tambahan = array(
    'cokelat' => $_GET['takaranCokelat'],
    'matcha' => $_GET['takaranMatcha'],
    'ice_cream' => $_GET['takaranIcecream']
);

// Insert or Update logic
if (empty($id)) {
    // Insert
    $url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/postKopi';
    $customrequest = 'POST';
} else {
    // Update
    $url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/updateKopiById?id=' . $id;
    $customrequest = 'PUT';
}

// Prepare the data to be sent
$data = array(
    'foto' => $foto,
    'nama' => $nama,
    'deskripsi' => $deskripsi,
    'penyajian' => $penyajian,
    'biji_kopi' => $biji_kopi,
    'penyeduhan_kopi' => $penyeduhan_kopi,
    'kopi' => $kopi,
    'less_sugar' => $less_sugar,
    'normal_sugar' => $normal_sugar,
    'extra_sugar' => $extra_sugar,
    'bahan_tambahan' => json_encode($bahan_tambahan)
);

// Initialize cURL
$cUrl = curl_init();

// Set cURL options
$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => $customrequest,
    CURLOPT_POSTFIELDS => http_build_query($data),
);

curl_setopt_array($cUrl, $options);

// Execute cURL request
$response = curl_exec($cUrl);

// Close cURL
curl_close($cUrl);

// Redirect after submission
header('Location: kopi.php');
?>
