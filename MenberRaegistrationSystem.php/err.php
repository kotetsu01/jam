<?php
include 'header.php';
session_start();
echo <<<EOM
<div class="err-space"></div>
<p id="item" class="err">{$_SESSION["errMessage"]}</font></p>
<p id="item">
<input type="button" onclick="location.href='login.php' "value="システムを終了する">
</p>
EOM;
$_SESSION = array();
if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", '', time() - 1800, '/');
}
session_destroy();
include 'footer.php';

