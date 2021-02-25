<?php
/**
 * 管理员验证器
 * by:小航 QQ:11467102
 */
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate
{
    //规则
    protected $rule = [
        'user'          => 'require|min:5|max:16|alphaNum',
        'password'      => 'require|min:6',
        'passwords'     => 'require|confirm:password',
        'mobile'        => 'mobile',
        'email'         => 'email',
        'age'           => 'number|between:1,120',
    ];

    //自定义提示信息
    protected $message = [
        'user.require'      => '账号不能为空！',
        'user.min'          => '账号位数过短！',
        'user.max'          => '账号位数过长！',
        'user.alphaNum'     => '账号只能是字母和数字组成！',
        'password.require'  => '密码不能为空！',
        'password.min'      => '密码位数过短！',
        'passwords.require' => '请输入确认密码！',
        'passwords.confirm' => '两次密码不一致！',
        'mobile.mobile'     => '手机号码格式不正确！',
        'email.email'       => '邮箱格式不正确！',
        'age.number'        => '年龄必须是数字！',
        'age.between'       => '年龄只能在1-120岁之间！',
    ];

    //add场景验证
    public function sceneAdd()
    {
        return $this->only(['user,password,passwords,mobile,email,age']);
    }

    //edit场景验证
    public function sceneEdit()
    {
        return $this->only(['user,password,mobile,email,age']);
    }
}