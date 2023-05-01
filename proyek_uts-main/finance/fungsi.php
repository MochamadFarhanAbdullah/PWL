<?php
session_start();

/**
 * Menyimpan operasi dan hasil perhitungan dalam session
 * 
 * @param $nama
 * @param $kategori
 * @param $jumlah
 * @param $keterangan
 * @return jumlah history yang tersimpan saat ini
 */
function addSessionHistt($nama, $kategori, $jumlah, $keterangan)
{
    $new_calc = [$nama, $kategori, $jumlah, $keterangan];
    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = [$new_calc];
    } else {
        array_push($_SESSION['history'], $new_calc);
    }
    return count($_SESSION['history']);
}