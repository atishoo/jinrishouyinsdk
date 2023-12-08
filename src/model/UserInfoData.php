<?php

namespace ShouyinToday\model;

class UserInfoData
{
    private $_ok;
    private $_err;
    private $unique_id;
    private $nickname;
    private $avatar;
    private $gender;
    private $phone;

    public function __construct(string $response)
    {
        $result = json_decode($response, true);
        $this->_ok = array_key_exists('status', $result) && $result['status'] == 1;
        $this->_err = array_key_exists('status', $result) && $result['status'] != 1 ? $result['msg'] : "";
        $this->unique_id = array_key_exists('data', $result) && array_key_exists('unique_id', $result['data']) ? $result['data']['unique_id'] : '';
        $this->nickname = array_key_exists('data', $result) && array_key_exists('nickname', $result['data']) ? $result['data']['nickname'] : '';
        $this->avatar = array_key_exists('data', $result) && array_key_exists('avatar', $result['data']) ? $result['data']['avatar'] : '';
        $this->gender = array_key_exists('data', $result) && array_key_exists('gender', $result['data']) ? $result['data']['gender'] : 0;
        $this->phone = array_key_exists('data', $result) && array_key_exists('phone', $result['data']) ? $result['data']['phone'] : '';
    }

    /**
     * @return string
     */
    public function getUniqueId()
    {
        return $this->unique_id;
    }

    /**
     * @param string $unique_id
     */
    public function setUniqueId($unique_id): void
    {
        $this->unique_id = $unique_id;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
}
