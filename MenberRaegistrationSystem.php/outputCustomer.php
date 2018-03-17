<?php
require 'CustomerBean.php';
require "SideEntryCheck.php";
include 'header.php';
session_start();
sec();
echo <<<EOM
<div id="space"></div>
<div class="items"><h2>会員情報確認</h2></div>
<p class="center-wrap">この時点では、まだ登録が完了しておりません。内容に誤りがないことを確認の上、
「この内容で登録する」ボタンをクリックしてください。訂正をする場合は、
「会員情報に戻る」ボタンをクリックしてください。</p>
<div class="center">
<div class="center-wrap">
<form action="CustomerServlet.php" method="post">
<table id="tableCenter">
    <tr><td>会員名 :</td><td>{$_SESSION["customer"]->getCst_name()}</td></tr>
    <tr><td>郵便番号 :</td><td>{$_SESSION["customer"]->getCst_zip()}</td></tr>
    <tr><td>住所 :</td><td>{$_SESSION["customer"]->getCst_addr()}</td></tr>
    <tr><td>電話番号 :</td><td>{$_SESSION["customer"]->getCst_tel()}</td></tr>
    <tr><td>パスワード :</td><td>*******</td></tr>
    <tr><td>メールアドレス :</td><td>{$_SESSION["customer"]->getCst_mail()}</td></tr>
</table>
<input type="hidden" name="cmd" value="t_inCust">
<input type="button" onclick="location.href='CustomerServlet.php?menu=sc_inCust' " value="会員情報入力に戻る">
<input type="submit" value="この内容で登録する">
</form>
</div>
</div>
EOM;
include 'footer.php';
