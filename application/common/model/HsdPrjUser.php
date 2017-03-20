<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/3
 * Time: 16:17
 */

namespace app\common\model;

use think\Model;
class HsdPrjUser extends Model
{
    static public function login($username, $password)
    {// 验证用户是否存在
        $map = array('user_name' => $username);
        $HsdPrjUser = self::get($map);

        if (!is_null($HsdPrjUser)) {
            // 验证密码是否正确
            if ($HsdPrjUser->checkPassword($password)) {
                // 登录
                session('userName',$HsdPrjUser->getData('user_name'));
                session('userId',$HsdPrjUser->getData('prj_user_id'));

                return true;
            }
        }
        return false;
    }
    public function checkPassword($password)
    {
        if ($this->getData('user_password') ===$this::encryptPassword($password))
        {
            return true;
        } else {
            return false;
        }
    }
    static public function encryptPassword($password)
    {
        // 实际的过程中，我还可以借助其它字符串算法，来实现不同的加密。
        return sha1(md5($password) . 'wjk');
    }
    static public function logOut()
    {
        // 销毁session中数据
        session('userId', null);
        session('userName',null);
        return true;
    }

}