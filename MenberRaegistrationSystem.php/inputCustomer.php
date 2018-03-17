<script>
function clr(){
	document.inputCustomer.cst_name.value="";
	document.inputCustomer.cst_zip.value="";
	document.inputCustomer.cst_addr.value="";
	document.inputCustomer.cst_tel.value="";
	document.inputCustomer.cst_pass.value="";
	document.inputCustomer.cst_mail.value="";
	document.inputCustomer.cst_mail.value="";

	var check = document.getElementById('check');
	while (check.hasChildNodes()){
		check.removeChild(check.firstChild);
	}

	var emailerrMsg = document.getElementById('emailerrMsg');
	if (emailerrMsg.hasChildNodes()){
		emailerrMsg.removeChild(emailerrMsg.firstChild);
	}
}
</script>
<?php
require "CustomerBean.php";
require "SideEntryCheck.php";
include 'header.php';
session_start();
sec();
//初回処理
if(!isset($_SESSION['check'])){
    $_SESSION['check']=null;
}
if(!isset($_SESSION['emailerrMsg'])){
    $_SESSION['emailerrMsg']=null;
}
echo<<<EOM
<div id="space"></div>
<div class="items"><h2>会員情報入力</h2></div>
<p class="center-wrap">会員情報を下記に入力して、「この内容で確認する」ボタンをクリックしてください。</p>
<div class="center">
<div class="center-wrap">
<form name="inputCustomer" action="CustomerServlet.php" method="post">
<table id="tableCenter">
    <tr><td>会員名<span class="necessary"> (必須)</span>:</td><td><input type="text" name="cst_name" maxlength="30" value="{$_SESSION["customer"]->getCst_name()}"></td></tr>
    <tr><td>郵便番号<span class="necessary"> (必須) </span>:</td><td><input type="text" name="cst_zip" maxlength="10" value="{$_SESSION["customer"]->getCst_zip()}"></td></tr>
    <tr><td>住所<span class="necessary"> (必須) </span>:</td><td><input type="text" name="cst_addr" maxlength="50" value="{$_SESSION["customer"]->getCst_addr()}"></td></tr>
    <tr><td>電話番号<span class="necessary"> (必須) </span>:</td><td><input type="text" name="cst_tel" maxlength="15" value="{$_SESSION["customer"]->getCst_tel()}"></td></tr>
    <tr><td>パスワード<span class="necessary"> (必須) </span>:</td><td><input type="password" name="cst_pass" maxlength="10" value="{$_SESSION["customer"]->getCst_pass()}"></td></tr>
    <tr><td>メールアドレス :</td><td><input type="text" name="cst_mail" maxlength="50" value="{$_SESSION["customer"]->getCst_mail()}"></td></tr>
</table>
<div id="check" class="necessary">{$_SESSION['check']}</div>
<div id="emailerrMsg" class="necessary">{$_SESSION['emailerrMsg']}</div>
<input type="hidden" name="cmd" value="s_inCust">
<input type="button" value="この内容を消去する" onclick="clr()">
<input type="submit" value="この内容で確認する">
</form>
</div>
</div>
EOM;
unset($_SESSION['check']);
unset($_SESSION['emailerrMsg']);
include 'footer.php';