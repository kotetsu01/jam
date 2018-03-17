<?php

class CustomerBean{
    private $cst_id;
    private $cst_name;
    private $cst_zip;
    private $cst_addr;
    private $cst_tel;
    private $cst_mail;
    private $cst_userid;
    private $cst_pass;
    private $admission_date;
    private $withdrawal_date;
    private $del_flag;

    public function getCst_id()
    {
        return $this->cst_id;
    }

    public function getCst_name()
    {
        return $this->cst_name;
    }

    public function getCst_zip()
    {
        return $this->cst_zip;
    }

    public function getCst_addr()
    {
        return $this->cst_addr;
    }

    public function getCst_tel()
    {
        return $this->cst_tel;
    }

    public function getCst_mail()
    {
        return $this->cst_mail;
    }

    public function getCst_userid()
    {
        return $this->cst_userid;
    }

    public function getCst_pass()
    {
        return $this->cst_pass;
    }

    public function getAdmission_date()
    {
        return $this->admission_date;
    }

    public function getWithdrawal_date()
    {
        return $this->withdrawal_date;
    }

    public function getDel_flag()
    {
        return $this->del_flag;
    }

    public function setCst_id($cst_id)
    {
        $this->cst_id = $cst_id;
    }

    public function setCst_name($cst_name)
    {
        $this->cst_name = $cst_name;
    }

    public function setCst_zip($cst_zip)
    {
        $this->cst_zip = $cst_zip;
    }

    public function setCst_addr($cst_addr)
    {
        $this->cst_addr = $cst_addr;
    }

    public function setCst_tel($cst_tel)
    {
        $this->cst_tel = $cst_tel;
    }

    public function setCst_mail($cst_mail)
    {
        $this->cst_mail = $cst_mail;
    }

    public function setCst_userid($cst_userid)
    {
        $this->cst_userid = $cst_userid;
    }

    public function setCst_pass($cst_pass)
    {
        $this->cst_pass = $cst_pass;
    }

    public function setAdmission_date($admission_date)
    {
        $this->admission_date = $admission_date;
    }

    public function setWithdrawal_date($withdrawal_date)
    {
        $this->withdrawal_date = $withdrawal_date;
    }

    public function setDel_flag($del_flag)
    {
        $this->del_flag = $del_flag;
    }

}
