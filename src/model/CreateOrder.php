<?php

namespace ShouyinToday\model;

class CreateOrder
{
    private $trade_no;
    private $user;
    private $title;
    private $description;
    private $time;
    private $money;
    private $appid;
    private $attach;
    private $noncestr;
    private $sign;

    /**
     * @return string
     */
    public function getTradeNo()
    {
        return $this->trade_no;
    }

    /**
     * @param string $trade_no
     */
    public function setTradeNo($trade_no): void
    {
        $this->trade_no = $trade_no;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(int $time): void
    {
        $this->time = $time;
    }

    /**
     * @return string
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param string $money
     */
    public function setMoney(int $money): void
    {
        $this->money = $money;
    }

    /**
     * @return mixed
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param mixed $appid
     */
    public function setAppid($appid): void
    {
        $this->appid = $appid;
    }

    /**
     * @return mixed
     */
    public function getAttach()
    {
        return $this->attach;
    }

    /**
     * @param mixed $attach
     */
    public function setAttach($attach): void
    {
        $this->attach = $attach;
    }

    /**
     * @return mixed
     */
    public function getNoncestr()
    {
        return $this->noncestr;
    }

    /**
     * @param mixed $noncestr
     */
    public function setNoncestr($noncestr): void
    {
        $this->noncestr = $noncestr;
    }

    /**
     * @return mixed
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * @param mixed $sign
     */
    public function setSign($sign): void
    {
        $this->sign = $sign;
    }

}
