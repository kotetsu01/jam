<?php
require "CustomerBean.php";
require "CustomerDAO.php";
require 'LoginBean.php';
$check="";
session_start();

if(strcmp($_GET["menu"],"sc_inCust")==0){
    $_SESSION['check']="";
    $_SESSION['emailerrMsg']="";
    header('Location: inputCustomer.php');
}else{
    if(strcmp($_POST["cmd"],"login")==0){
        $result_Login=login();
        if(empty($result_Login)){
            $_SESSION["loginErr"] = "ログイン出来ませんでした。UserNameとpasswordをご確認ください。";
            header('Location: login.php');
        }else{
            $_SESSION["userName"] = $result_Login;
            header('Location: top.php');
        }
    }else if(strcmp($_POST["cmd"],"logout")==0){
        logout();
        header('Location: login.php');
    }else if(strcmp($_POST["cmd"],"fs_inCust")==0){
        $_SESSION['customer']=insertCustomerIn();
        header('Location: inputCustomer.php');
    }else if(strcmp($_POST["cmd"],"s_inCust")==0){
        $_SESSION['customer']=insertCustomerIn();
        $check=otherCheck($check);
        $_SESSION['emailerrMsg']=mailaddressCheck($_POST["cst_mail"]);
        if($check=="" && $_SESSION['emailerrMsg']==""){
            header('Location: outputCustomer.php');
        }else{
            $_SESSION['check']=$check;
            header('Location: inputCustomer.php');
        }
    }else if(strcmp($_POST["cmd"],"t_inCust")==0){
        $_SESSION['customer'] = insertCustomerDb();
        header('Location: finalyCustomer.php');
    }else if(strcmp($_POST["cmd"],"fo_inCust")==0){
        header('Location: top.php');
    }else if(strcmp($_POST["cmd"],"display")){
        header('Location: ComingSoon.php');
    }else if(strcmp($_POST["cmd"],"update")){
        header('Location: ComingSoon.php');
    }else if(strcmp($_POST["cmd"],"dele")){
        header('Location: ComingSoon.php');
    }
}

function login(){
    $login = new LoginBean();
    $login->setAd_userid($_POST["userid"]);
    $login ->setAd_pass($_POST["userpass"]);
    $cdao = new CustomerDAO();
    $userName= $cdao->loginDb($login);
    return $userName;
}

function logout(){
    $_SESSION = array();
    if (isset($_COOKIE["PHPSESSID"])) {
        setcookie("PHPSESSID", '', time() - 1800, '/');
    }
    session_destroy();
}

function insertCustomerIn(){
    $customer = new CustomerBean();
    $customer -> setCst_name($_POST["cst_name"]);
    $customer -> setCst_zip($_POST["cst_zip"]);
    $customer -> setCst_addr($_POST["cst_addr"]);
    $customer -> setCst_tel($_POST["cst_tel"]);
    $customer -> setCst_mail($_POST["cst_mail"]);
    $customer -> setCst_pass($_POST["cst_pass"]);
    $customer -> setAdmission_date(date("Y/m/d"));
    $customer -> setWithdrawal_date(date("Y/m/d"));
    return $customer;
}

function insertCustomerDb(){
    $customer = new CustomerBean();
    $customer -> setCst_name($_SESSION["customer"]->getCst_name());
    $customer -> setCst_zip($_SESSION["customer"]->getCst_zip());
    $customer -> setCst_addr($_SESSION["customer"]->getCst_addr());
    $customer -> setCst_tel($_SESSION["customer"]->getCst_tel());
    $customer -> setCst_mail($_SESSION["customer"]->getCst_mail());
    $customer -> setCst_pass($_SESSION["customer"]->getCst_pass());
    $customer -> setAdmission_date(date("Y/m/d"));
    $customer -> setWithdrawal_date(date("Y/m/d"));
    $cdao = new CustomerDAO();
    $customer = $cdao->insertCustomerDb($customer);
    return $customer;
}

function otherCheck($check){
    if(empty($_POST['cst_name'])){
        $check=$check."会員名を入力してください。"."<br>";
    }
    if(empty($_POST['cst_zip'])){
        $check=$check."郵便番号をを入力してください。"."<br>";
    }
    if(empty($_POST['cst_addr'])){
        $check=$check."住所を入力してください。"."<br>";
    }
    if(empty($_POST['cst_tel'])){
        $check=$check."電話番号をを入力してください。"."<br>";
    }
    if(empty($_POST['cst_pass'])){
        $check=$check."パスワードを入力してください。"."<br>";
    }
    return $check;
}

function mailaddressCheck($mail){
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
        return "";
    }else{
        return "メールアドレス書式が間違っています。";
    }
}