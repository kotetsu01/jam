<?php
class LoginBean{
    private $ad_no;
    private $ad_name;
    private $ad_userid;
    private $ad_pass;
    /**
     * @return mixed
     */
    public function getAd_no()
    {
        return $this->ad_no;
    }

    /**
     * @return mixed
     */
    public function getAd_name()
    {
        return $this->ad_name;
    }

    /**
     * @return mixed
     */
    public function getAd_userid()
    {
        return $this->ad_userid;
    }

    /**
     * @return mixed
     */
    public function getAd_pass()
    {
        return $this->ad_pass;
    }

    /**
     * @param mixed $ad_no
     */
    public function setAd_no($ad_no)
    {
        $this->ad_no = $ad_no;
    }

    /**
     * @param mixed $ad_name
     */
    public function setAd_name($ad_name)
    {
        $this->ad_name = $ad_name;
    }

    /**
     * @param mixed $ad_userid
     */
    public function setAd_userid($ad_userid)
    {
        $this->ad_userid = $ad_userid;
    }

    /**
     * @param mixed $ad_pass
     */
    public function setAd_pass($ad_pass)
    {
        $this->ad_pass = $ad_pass;
    }




}