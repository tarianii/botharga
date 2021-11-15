<?php
ini_set('display_errors', 1);
require "multicurl.php";


function getHigh()
{
    $regis = multicurl("https://indodax.com/api/tickers");
    $result = json_decode($regis, true);
    $list_high = "";

    foreach ($result as $tickers) {
        foreach ($tickers as $aset => $a) {
            if ($a['last'] == $a['high']) {
                $list_high = $list_high . "\n$aset";
            }
        }
    }

    $pesan = "Daftar market dengan nilai tinggi Hari ini : $list_high";
    return $pesan;
}

function getLow()
{
    $regis = multicurl("https://indodax.com/api/tickers");
    $result = json_decode($regis, true);
    $list_low = "";


    foreach ($result as $tickers) {
        foreach ($tickers as $aset => $a) {
            if ($a['last'] == $a['low']) {
                $list_low = $list_low . "\n$aset";
            }
        }
    }

    $pesan = "Daftar market dengan nilai rendah Hari ini : $list_low";
    return $pesan;
}

function datacrash5()
{
    $regis = multicurl("https://indodax.com/api/tickers");
    $result = json_decode($regis, true);
    $list_crash5 = "";

    foreach ($result as $tickers) {
        foreach ($tickers as $aset => $a) {
            $minus  = (($a['high'] - $a['last']) / $a['last']) * 100;
            $minusku = substr($minus, 0, 4);
            $harga = $a['last'];
            if ($minus > 5) {
                $list_crash5 = $list_crash5 . "\n\n $aset ||🔻$minusku % ||💸$harga";
            }
        }
    }

    $pesan = "Daftar aset pada market indodax koreksi diatas 5% : $list_crash5";
    return $pesan;
}

function datacrash10()
{
    $regis = multicurl("https://indodax.com/api/tickers");
    $result = json_decode($regis, true);
    $list_crash10 = "";

    foreach ($result as $tickers) {
        foreach ($tickers as $aset => $a) {
            $minus  = (($a['high'] - $a['last']) / $a['last']) * 100;
            $minusku = substr($minus, 0, 4);
            $harga = $a['last'];
            if ($minus > 10) {
                $list_crash10 = $list_crash10 . "\n\n $aset ||🔻$minusku % ||💸$harga";
            }
        }
    }

    $pesan = "Daftar aset pada market indodax koreksi diatas 10% : $list_crash10";
    return $pesan;
}

function datacrash20()
{
    $regis = multicurl("https://indodax.com/api/tickers");
    $result = json_decode($regis, true);
    $list_crash20 = "";

    foreach ($result as $tickers) {
        foreach ($tickers as $aset => $a) {
            $minus  = (($a['high'] - $a['last']) / $a['last']) * 100;
            $minusku = substr($minus, 0, 4);
            $harga = $a['last'];
            if ($minus > 2) {
                $list_crash20 = $list_crash20 . "\n\n $aset ||🔻$minusku % ||💸$harga";
            }
        }
    }

    $pesan = "Daftar aset pada market indodax koreksi diatas 20% : $list_crash20";
    return $pesan;
}
function datacrash5binance()
{
    $regis = multicurl("https://fapi.binance.com/fapi/v1/ticker/24hr");
    $result = json_decode($regis);
    echo $result->symbol;
}
