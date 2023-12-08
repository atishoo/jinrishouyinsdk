<?php

namespace ShouyinToday\model;

class CreateQrLinkDataResponse
{
    private $_ok;
    private $_err;
    private $_qr_text;

    public function __construct(string $response){
        $result = json_decode($response, true);
        $this->_ok = array_key_exists('status', $result) && $result['status'] == 1;
        $this->_err = array_key_exists('status', $result) && $result['status'] != 1 ? $result['msg'] : "";
        $this->_qr_text = array_key_exists('data', $result) ? $result['data'] : "";
    }

    public function isSuccess(){
        return $this->_ok;
    }

    public function getError(){
        return $this->_err;
    }

    public function getQrText(){
        return $this->_qr_text;
    }

}
