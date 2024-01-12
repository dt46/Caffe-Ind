<?php
function getKopi($nama_kopi, $penyajian)
{
    // Encode parameter nama_kopi untuk URL
    $encoded_nama_kopi = urlencode($nama_kopi);

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKopiUntukKonsumsi?nama=' . $encoded_nama_kopi . '&penyajian=' . $penyajian,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $kopi = json_decode($response);

    curl_close($cUrl);

    return $kopi;
}

session_start();
$id = $_GET['id'];
$id_konsumen = $_GET['id_konsumen'];
$nama_kopi = $_GET['selected_coffee'];
$penyajian = $_GET['penyajian'];

$getKopi = getKopi($nama_kopi, $penyajian);

$id_kopi = $getKopi[0]->_id;
$quantity = $_GET['quantity'];
$sugar = $_GET['sugar'];
date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');
$bahan_tambahan = isset($_GET['bahan_tambahan']) ? implode(',', $_GET['bahan_tambahan']) : '';

// Mendapatkan nilai glukosa berdasarkan pilihan sugar
if ($sugar === 'Less Sugar') {
    $glukosa = $getKopi[0]->less_glukosa;
} elseif ($sugar === 'Normal Sugar') {
    $glukosa = $getKopi[0]->normal_glukosa;
} elseif ($sugar === 'Extra Sugar') {
    $glukosa = $getKopi[0]->extra_glukosa;
} else {
    // Nilai default jika pilihan sugar tidak valid
    $glukosa = 0;
}

$kafein = $getKopi[0]->kafein;

$optionalIngredients = $_GET['bahan_tambahan'] ?? [];
foreach ($optionalIngredients as $ingredient) {
    switch ($ingredient) {
        case 'Cokelat':
            // Adjust kafein for Cokelat
            $kafein += 20;
            break;
        case 'Matcha':
            // Adjust kafein for Matcha
            $kafein += 60;
            break;
        case 'Ice Cream':
            // Adjust glukosa for Ice Cream
            $glukosa += 10;
            break;
    }
}

$kafein *= $quantity;
$glukosa *= $quantity;


if (empty($id)) {
    //Insert
    $url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/postKonsumsiKopi';
    $customrequest = 'POST';
} else {
    //Update
    $url = 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/updateKonsumsiKopi?id=' . $id;
    $customrequest = 'PUT';
}

$cUrl = curl_init();


$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => $customrequest,
    CURLOPT_POSTFIELDS => http_build_query(array(
        'id_konsumen' => $id_konsumen,
        'id_kopi' => $id_kopi,
        'quantity' => $quantity,
        'kafein' => $kafein,
        'glukosa' => $glukosa,
        'sugar' => $sugar,
        'waktu' => $waktu,
        'bahan_tambahan' => $bahan_tambahan
    )),
);
curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$data = json_decode($response);

curl_close($cUrl);

header('Location: userpage.php');
