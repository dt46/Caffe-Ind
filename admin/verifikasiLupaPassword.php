<?php    
    $id = $_GET['id'];
    $input_jawaban_lupa_password = strtolower($_GET['jawaban_lupa_password']);

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAdminById?id=' . $id,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true,
    );
    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);

    curl_close($cUrl);  
    
    $jawaban_lupa_password = strtolower($data[0]->jawaban_lupa_password);

    if ($input_jawaban_lupa_password === $jawaban_lupa_password){
        // Konfirmasi Password Berhasil
        header('Location: lupapw_gantipw.php?id='.$id);
    } else {
        // Konfirmasi Password Gagal
        echo "<script>alert('Jawaban yang Kamu masukkan salah. Mohon masukkan jawaban dengan tepat'); window.location.href = 'lupapw_kuisioner.php?id=".$id."';</script>";
    }    
?>