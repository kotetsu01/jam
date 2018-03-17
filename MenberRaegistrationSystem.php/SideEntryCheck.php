<?php
function sec(){
try{
    if(!isset($_SESSION["userName"])){
        throw new Exception();
    }else{
        if(!isset($_SESSION["customer"])){
            throw new Exception();
        }
    }
}catch(Exception $e){
    $_SESSION["errMessage"]="システムの不具合が発生しました。";
    header('Location: err.php');
}
}