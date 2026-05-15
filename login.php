<?php
require_once('common.php');
if ($_POST['username'] === 'ali' && $_POST['password'] === 'HJGSDerA9ds7VHGasASVK') {
  $_SESSION['logged_in'] = true;
  $_SESSION['username'] = $_POST['username'];
  resetAccount();
  header('Location: account.php');
} else {
  header('Location: login.html');
}
?>
