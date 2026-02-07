<?php
include 'config.php';

$api_url = XTREAM_HOST . "/player_api.php?username=" . XTREAM_USER . "&password=" . XTREAM_PASS . "&action=get_live_streams";

$response = file_get_contents($api_url);
$channels = json_decode($response, true);

if (!$channels) {
    die("خطأ: لم نتمكن من جلب القنوات. تأكد من بيانات السيرفر.");
}

echo "<h2>قائمة قنوات سيرفر Hikcoo</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>اسم القناة</th><th>الرقم (ID) المطلوب</th></tr>";

foreach ($channels as $channel) {
    echo "<tr>";
    echo "<td>" . $channel['name'] . "</td>";
    echo "<td><b>" . $channel['stream_id'] . "</b></td>";
    echo "</tr>";
}
echo "</table>";
?>