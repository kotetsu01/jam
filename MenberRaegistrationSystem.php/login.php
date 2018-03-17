<?php
include 'header.php' ;
session_start();
if(!isset($_SESSION['loginErr'])){
    $_SESSION['loginErr']=null;
}

echo <<<EOM
<div id="space"></div>
<div class="center">
<img src="design/eelcat.png"><div id="space"></div>
<form  action="CustomerServlet.php"  method="post">
User Name：<input type="text" name="userid" maxlength="10"/>
Password：<input type="password" name="userpass" maxlength="10"/>
<input type="submit" value="ログイン"/>
<input type="hidden" name="cmd" value="login">
<div class="necessary">{$_SESSION['loginErr']}</div>
</form>
</div>
EOM;
unset($_SESSION['loginErr']);
include 'footer.php' ;