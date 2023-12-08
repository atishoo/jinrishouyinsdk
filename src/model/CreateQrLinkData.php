<?php

namespace ShouyinToday\model;

class CreateQrLinkData
{
    private $id;
    private $attach;
    private $noncestr;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getAttach()
    {
        return $this->attach;
    }

    /**
     * @param string $attach
     */
    public function setAttach(string $attach): void
    {
        $this->attach = $attach;
    }

    /**
     * @return string
     */
    public function getNoncestr()
    {
        return $this->noncestr;
    }

    /**
     * @param string $noncestr
     */
    public function setNoncestr(string $noncestr): void
    {
        $this->noncestr = $noncestr;
    }



}
