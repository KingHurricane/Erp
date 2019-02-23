<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%controller_methods}}".
 *
 * @property int $id 控制器方法ID
 * @property string $name 控制器方法名
 * @property int $controller_class_id 控制器类ID
 */
class Controller_method extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%controller_method}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'controller_class_id'], 'required'],
            [['controller_class_id'], 'integer'],
            [['name'], 'string', 'max' => 127],
        ];
    }

    public static function listMapByControllerClassID($id){
        return ArrayHelper::map(static::find()->where(["controller_class_id" => $id])->asArray()->all(), "id", "name");
    }

    public static function listMap(){
        $list = static::find()->asArray()->all();
        $temp = [];
        foreach($list as $key => $value){
            $temp[$value['controller_class_id']][] = $value;
        }
        return $temp;
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '控制器方法ID',
            'name' => '控制器方法名',
            'controller_class_id' => '控制器类ID',
        ];
    }
}
