<?php

/**
 * koneksi.php
 * -------------------------------------------------------------------
 * Helper sederhana untuk mengambil koneksi database di CodeIgniter 4.
 * Konfigurasi asli tetap berada di app/Config/Database.php.
 *
 * Cara pakai di Controller/Model:
 *   helper('koneksi');
 *   $db = koneksi();
 *   $query = $db->query('SELECT * FROM users');
 * -------------------------------------------------------------------
 */

if (! function_exists('koneksi')) {
    function koneksi()
    {
        return \Config\Database::connect();
    }
}
