<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%emp_role}}".
 *
 * @property int $emp_id 管理员ID
 * @property int $role_id 角色ID
 */
class EmpRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%emp_role}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_id', 'role_id'], 'required'],
            [['emp_id', 'role_id'], 'integer'],
            [['emp_id', 'role_id'], 'unique', 'targetAttribute' => ['emp_id', 'role_id']],
        ];
    }

    public static function roleListByEmpID($id = null){
        $role = static::find()->where(["emp_id" => $id])->asArray()->all();
        return ArrayHelper::getColumn($role, 'role_id');
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => '管理员ID',
            'role_id' => '角色ID',
        ];
    }
}
