<?php
require 'CustomerBean.php';
require "SideEntryCheck.php";
include 'header.php' ;
session_start();
sec();
echo <<<EOM
<div id="space"></div>
<div class="items"><h2>会員登録完了</h2></div>
<p class="center-wrap">{$_SESSION["customer"]->getCst_name()}様　新規会員登録が完了しました。発行されたユーザIDは下記の通りです。</p>
<div class="center">
<div class="center-wrap">
<form action="CustomerServlet.php" method="post">
<table id="tableCenter">
    <tr><td>会員名 :</td><td>{$_SESSION["customer"]->getCst_name()}</td></tr>
<tr><td>会員名 :</td><td>{$_SESSION["customer"]->getCst_zip()}</td></tr>
    <tr><td>ユーザID :</td><td>{$_SESSION["customer"]->getCst_userid()}</td></tr>
</table>
<input type="hidden" name="cmd" value="fo_inCust">
<input type="submit" value="会員登録完了">
</form>
</div>
</div>
EOM;
unset($_SESSION['customer']);
include 'footer.php';