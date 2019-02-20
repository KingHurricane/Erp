<?php
namespace backend\models;

use yii\base\Model;

/**
 * Signup form
 */
class UpdateForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $name;
    public $gender;
    public $tele;
    public $address;
    public $birthday;
    public $dep_id;
    public $role_id;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => '必填'],
//            ['username', 'unique', 'targetClass' => '\backend\models\Emp', 'message' => '用户名已存在.'],
            ['username', 'string', 'min' => 2, 'max' => 255, 'message' => '2-255个字符之间'],

            ['email', 'trim'],
            ['email', 'required', 'message' => '必填'],
            ['email', 'email', 'message' => '邮箱格式不正确'],
            ['email', 'string', 'max' => 255, 'message' => '邮箱地址过长'],
//            ['email', 'unique', 'targetClass' => '\backend\models\Emp', 'message' => '此邮箱已存在.'],

            ['password', 'required', 'message' => '必填'],
            ['password', 'string', 'min' => 6, 'message' => '密码至少6位', ],

            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码输入必须不一致'],
            ['password_repeat', 'required', 'message' => '必填'],

            [['name', 'gender', 'birthday', 'tele', 'address', 'dep_id',], 'required', 'message' => '必填'],
            ['name', 'string', 'max' => '255', 'message' => '字符串过长'],

            ['gender', 'integer', 'message' => '必须为数字'],
            ['tele', 'string', 'max' => 30, 'message' => '字符串过长'],
            ['address', 'string', 'max' => 255, 'message' => '字符串过长'],
            ['birthday', 'string', 'max' => 30, 'message' => '字符串过长'],
            ['birthday', 'filter', 'filter' => function($value){ return strtotime($value);}],
//            ['birthday', 'filter', 'strtotime'],
            ['dep_id', 'integer', 'message' => '选项非法'],
        ];
    }

    public function loadDbData($id){
        $emp = Emp::findOne($id);
        $this->username = $emp->username;
        $this->password = $emp->password_hash;
        $this->password_repeat = $emp->password_hash;
        $this->email = $emp->email;
        $this->name = $emp->name;
        $this->gender = $emp->gender;
        $this->tele = $emp->tele;
        $this->address = $emp->address;
        $this->birthday = date('Y-m-d', $emp->birthday);
        $this->dep_id = $emp->dep_id;
    }

    public function update($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = Emp::findOne($id);
        $user->username = $this->username;
        $user->email = $this->email;
        if($user->password_hash !== $this->password){
               $user->setPassword($this->password);
        }
        $user->name = $this->name;
        $user->gender = $this->gender;
        $user->tele = $this->tele;
        $user->address = $this->address;
        $user->birthday = $this->birthday;
        $user->dep_id = $this->dep_id;


        return $user->save() ? $user : null;
    }

}