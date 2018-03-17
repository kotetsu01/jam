<?php
include 'header.php' ;
session_start();
try{
    if(!$_SESSION["userName"]){
        throw new Exception();
    }
}catch(Exception $e){
    $_SESSION["errMessage"]="システムの不具合が発生しました。";
    header('Location: err.php');
}
echo <<<EOM
<div class="conts">
<div class="left"></div>
<div class="right">
<a>User Name：{$_SESSION["userName"]}</a>
<form class="logout" action="CustomerServlet.php" method="post" name="logout">
<input type="hidden" name="cmd" value="logout">
<a href="javascript:logout.submit()">ログアウト</a>
</form>
</div>
</div>
EOM;
echo <<<EOM
<div id="space"></div>
<div class="center">
<div class="top-space">
<form action="CustomerServlet.php" method="post" name="inCust">
<input type="hidden" name="cmd" value="fs_inCust">
<div class="center"><a href="javascript:inCust.submit()">新規会員登録</a>
</form>
</div>

<div class="top-space">
<form action="CustomerServlet.php" method="post" name="display">
<input type="hidden" name="cmd" value="display">
<div class="center"><a href="javascript:display.submit()">会員情報表示</a>
</form>
</div>

<div class="top-space">
<form action="CustomerServlet.php" method="post" name="update">
<input type="hidden" name="cmd" value="update">
<div class="center"><a href="javascript:update.submit()">会員情報変更</a>
</form>
</div>

<div class="top-space">
<form action="CustomerServlet.php" method="post" name="dele">
<input type="hidden" name="cmd" value="dele">
<div class="center"><a href="javascript:dele.submit()">会員退会</a>
</form>
</div>

</div>
EOM;
include 'footer.php' ;