<?php

namespace ShouyinToday;

use ShouyinToday\model\CreateOrder;
use ShouyinToday\model\CreateQrLinkData;

class Cashier
{
    private const _baseurl = "http://api.pay.atishoo.cn";
    private const _create_order = "/api/order/create";
    private const _refund_order = "/api/order/refund";
    private const _refund_transfer = "/api/order/transfer";
    private const _create_grant_qr_text = "/api/auth/qr";
    private const _get_user_info = "/api/auth/profile";
    private const _get_user_phone = "/api/auth/phone";
    private $appid;
    private $private_key;
    public function __construct(string $appid, string $private_key)
    {
        $this->appid = $appid;
        $this->private_key = $private_key;
    }

    public function createOrder(CreateOrder $obj)
    {

    }

    public function getGrantQrText(CreateQrLinkData $obj)
    {
        $params = [
            'no' => strlen($obj->getId())>32?substr($obj->getId(),0,32):$obj->getId(),
            'appid'=> $this->appid,
            'attach' => $obj->getAttach(),
            'noncestr' => $obj->getNoncestr()
        ];

        $params['sign'] = $this->_buildSign($params);

        $response = $this->_post(self::_create_grant_qr_text, $params);
        return $response;
    }

    public function getUserInfo(string $code)
    {

    }

    public function getUserPhone(string $code)
    {

    }

    private function _buildSign(array $params)
    {
        ksort($params, SORT_STRING);
        $result = "";
        openssl_private_encrypt($params, $result, $this->private_key);
        return $result;
    }

    private function _post(string $url, array $body)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::_baseurl.$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
