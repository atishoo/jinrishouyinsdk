<?php

namespace ShouyinToday;

use ShouyinToday\model\CreateOrder;
use ShouyinToday\model\CreateQrLinkData;
use ShouyinToday\model\CreateQrLinkDataResponse;
use ShouyinToday\model\QrGrantResponse;
use ShouyinToday\model\UserInfoData;

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

    public function getGrantQrText(CreateQrLinkData $obj):CreateQrLinkDataResponse
    {
        $params = [
            'no' => strlen($obj->getId())>32?substr($obj->getId(),0,32):$obj->getId(),
            'appid'=> $this->appid,
            'attach' => $obj->getAttach(),
            'noncestr' => $obj->getNoncestr()
        ];

        $params = $this->_buildSign($params);

        $response = $this->_post(self::_create_grant_qr_text, $params);

        return new CreateQrLinkDataResponse($response);
    }

    public function getUserInfo(string $authcode)
    {
        $params = [
            'code'=> $authcode,
            'appid' => $this->appid,
        ];

        $params = $this->_buildSign($params);

        $response = $this->_post(self::_get_user_info, $params);

        return new UserInfoData($response);
    }

    public function getUserPhone(string $authcode)
    {
        $params = [
            'code'=> $authcode,
            'appid' => $this->appid,
        ];

        $params = $this->_buildSign($params);

        $response = $this->_post(self::_get_user_phone, $params);

        return new UserInfoData($response);
    }

    public function getGrantStatus(string $response)
    {
        return new QrGrantResponse(json_decode($response, true));
    }

    private function _decryptByPrivateKey(string $body) : array
    {
        $body = base64_decode(str_replace('"', "", $body));
        openssl_private_decrypt($body, $result, $this->private_key);
        $result = json_decode($result, true);
        return $result;
    }

    private function _buildSign(array $params)
    {
        array_filter($params, function ($value){
            return ($value !== null && $value !== '');
        });
        ksort($params, SORT_STRING);
        $result = "";
        openssl_private_encrypt(md5(http_build_query($params)), $result, $this->private_key);
        $params['sign'] = base64_encode($result);
        return $params;
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
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
