<?php

namespace ShouyinToday\model;

class QrGrantResponse
{
    private $code;
    private $attach;
    private $status;
    private $unique_id;
    private $noncestr;
    private $timestamp;

    public function __construct(array $response)
    {
        $this->code = array_key_exists('code', $response) ? $response['code'] : '';
        $this->attach = array_key_exists('attach', $response) ? $response['attach'] : '';
        $this->status = array_key_exists('status', $response) ? $response['status'] : '';
        $this->unique_id = array_key_exists('unique_id', $response) ? $response['unique_id'] : '';
        $this->noncestr = array_key_exists('noncestr', $response) ? $response['noncestr'] : '';
        $this->timestamp = array_key_exists('timestamp', $response) ? $response['timestamp'] : '';
    }

    /**
     * @return mixed|string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed|string
     */
    public function getAttach()
    {
        return $this->attach;
    }

    /**
     * @return bool
     */
    public function isScan()
    {
        return $this->status == "scan";
    }

    /**
     * @return bool
     */
    public function isInvalid()
    {
        return $this->status == "invalid";
    }

    /**
     * @return bool
     */
    public function isCancel()
    {
        return $this->status == "cancel";
    }

    /**
     * @return bool
     */
    public function isGrant()
    {
        return !$this->isInvalid() && !$this->isCancel() && !$this->isScan();
    }

    /**
     * @return string
     */
    public function getAuthCode()
    {
        if ($this->isGrant()) {
            return $this->status;
        } else {
            return "";
        }

    }

    /**
     * @return mixed|string
     */
    public function getUniqueId()
    {
        return $this->unique_id;
    }

    /**
     * @return mixed|string
     */
    public function getNoncestr()
    {
        return $this->noncestr;
    }

    /**
     * @return mixed|string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

}
