<?php
header("Access-Control-Allow-Origin: *");
include 'config.php';

if (isset($_GET['channels'])) {
    $ids = explode(',', $_GET['channels']);
    $stream_id = trim($ids[0]); // ياخذ أول قناة في القائمة

    // بناء رابط البث المباشر
    $final_url = XTREAM_HOST . "/live/" . XTREAM_USER . "/" . XTREAM_PASS . "/" . $stream_id . ".m3u8";

    // تحويل المشغل للرابط المباشر
    header("Location: " . $final_url);
    exit;
} else {
    echo "خطأ: لم يتم تحديد رقم القناة.";
}
?>