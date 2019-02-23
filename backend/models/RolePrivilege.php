<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%role_privilege}}".
 *
 * @property int $role_id 角色ID
 * @property int $privilege_id 权限ID
 */
class RolePrivilege extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%role_privilege}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'privilege_id'], 'required'],
            [['role_id', 'privilege_id'], 'integer'],
            [['role_id', 'privilege_id'], 'unique', 'targetAttribute' => ['role_id', 'privilege_id']],
        ];
    }

    public static function privilegeIdsByRole($role_id){
        $temp = [];
        $privileges = RolePrivilege::find()->select("privilege_id")->where(["role_id" => $role_id])->asArray()->all();

        foreach ($privileges as $key => $value){
            $temp[] = $value["privilege_id"];
        }
        return $temp;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_id' => '角色ID',
            'privilege_id' => '权限ID',
        ];
    }
}
