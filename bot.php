<?php
ini_set('display_errors', 1);
require "retrieveData.php";
// require "binanceretrive.php";

$token = "2063433506:AAHXf7hvAd7yongo96K0O-TTnuUZ35A_sDw";   // isi dengan token bot yang didapat dari @BotFather
$apiURL = "https://api.telegram.org/bot$token";
$update = json_decode(file_get_contents("php://input"), TRUE);
$chatID = $update["message"]["chat"]["id"];     // mengambil id pengirim pesan
$username = $update["message"]["chat"]["username"];   // mengambil username pengirim pesan
$message = $update["message"]["text"];        // mengambil isi pesan

if (strpos($message, "/start") === 0) {   // jika pesan mengandung kata "/start" di awal
    // maka akan terkirim pesan sebagai berikut
    file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=Halo $username.");
} elseif (strpos($message, "/pantau") === 0) {    // jika pesan mengandung kata "/pantau" di awal
    $daftarHigh = getHigh();
    $daftarLow = getLow();
    $pesan = str_replace(" ", "%20", "Halo $username. " . urlencode("\n$daftarHigh\n\n$daftarLow"));
    $hasil = file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$pesan");

    if ($hasil == false) {
        file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$message gagal.");
    }
} elseif (strpos($message, "/koreksi") === 0) {    // jika pesan mengandung kata "/koreksi" di awal
    $crash5 = datacrash5();
    $pesan = str_replace(" ", "%20", "Halo $username. " . urlencode("\n$crash5"));
    $hasil = file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$pesan");

    if ($hasil == false) {
        file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$message gagal.");
    }
} elseif (strpos($message, "/crash") === 0) {    // jika pesan mengandung kata "/koreksi" di awal
    $crash10 = datacrash10();
    $pesan = str_replace(" ", "%20", "Halo $username. " . urlencode("\n$crash10"));
    $hasil = file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$pesan");

    if ($hasil == false) {
        file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$message gagal.");
    }
} elseif (strpos($message, "/scam") === 0) {    // jika pesan mengandung kata "/koreksi" di awal
    $crash20 = datacrash20();
    $pesan = str_replace(" ", "%20", "Halo $username. " . urlencode("\n$crash20"));
    $hasil = file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$pesan");

    if ($hasil == false) {
        file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$message gagal.");
    }
} elseif (strpos($message, "/binance1") === 0) {    // jika pesan mengandung kata "/koreksi" di awal
    $crash5binance = datacrash5binance();
    $pesan = str_replace(" ", "%20", "Halo $username. " . urlencode("\n$crash5binance"));
    $hasil = file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$pesan");

    if ($hasil == false) {
        file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$message gagal.");
    }
} else {    // jika pesan tidak mengandung kedua kata tersebut pada awal kalimat
    file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=Perintah tidak dikenali.");
}
