<?php
require 'DBconn.php';

class CustomerDAO extends DBconn{
    public function insertCustomerDb(CustomerBean $customer){
        try{
            $stmt = $this->db->query("select * from Customer order by CST_ID desc limit 1;");
            $row = $stmt->fetch();
            $customer->setCst_userid("cst".sprintf('%05d',$row["CST_ID"]+1));

            $stmt = $this->db->prepare("INSERT INTO Customer(CST_NAME,CST_ZIP,CST_ADDR,CST_TEL,
                                 CST_MAIL,CST_USERID,CST_PASS,ADMISSION_DATE,WITHDRAWAL_DATE)VALUES(?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$cst_name);
            $stmt->bindParam(2,$cst_zip);
            $stmt->bindParam(3,$cst_addr);
            $stmt->bindParam(4,$cst_tel);
            $stmt->bindParam(5,$cst_mail);
            $stmt->bindparam(6,$cst_userid);
            $stmt->bindParam(7,$cst_pass);
            $stmt->bindParam(8,$admission_date);
            $stmt->bindParam(9,$withdrawal_date);

            $cst_name = $customer->getCst_name();
            $cst_zip = $customer->getCst_zip();
            $cst_addr = $customer->getCst_addr();
            $cst_tel = $customer->getCst_tel();
            $cst_mail = $customer->getCst_mail();
            $cst_userid = $customer->getCst_userid();
            $cst_pass = $customer->getCst_pass();
            $admission_date = $customer->getadmission_date();
            $withdrawal_date = $customer->getwithdrawal_date();
            $stmt->execute();

        }catch(PDOException $e){
            $message = $e -> getMessage();
            echo "データベースにエラーが発生しました。".$message;
        }
        return $customer;
    }

    public function loginDb(LoginBean $login){
        $userName="";
        try{
            $stmt = $this->db->prepare("select * from Admin where AD_USERID=? && AD_PASS=?;");

            $stmt->bindparam(1,$userid);
            $stmt->bindparam(2,$userpass);

            $userid = $login->getAd_userid();
            $userpass = $login->getAd_pass();
            $stmt->execute();

            if($row = $stmt->fetch()){
                $userName=$row["AD_NAME"];
            }

        }catch(PDOException $e){
            $message = $e -> getMessage();
            echo "データベースにエラーが発生しました。".$message;
        }
        return $userName;
    }
}