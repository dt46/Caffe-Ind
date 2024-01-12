<?php
    session_start();

    // Menghapus semua variabel/session
    session_destroy();

    header('location: ../index.php');
?>