<?php
session_start();
$password = 'password';

function generateToken($password) {
  $nonce = uniqid();
  $expires = time() + 3600;
  $data = bin2hex($nonce)."-".session_id()."-".$expires;
  $hash = hash_hmac('sha256', $data, $password);

  return $data."-".$hash;
}

function isLoggedIn() {
  if ($_SESSION['logged_in'] === true) {
    return true;
  }

  return false;
}

function resetAccount() {
  $_SESSION['balance'] = 500000;
  $_SESSION['transfers'] = [];
}

// Tambah kat bawah sekali dalam common.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['csrf_token'])) {
    // Kita generate token random yang susah hacker nak teka
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
