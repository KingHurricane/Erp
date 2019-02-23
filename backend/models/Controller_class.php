<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%controller_class}}".
 *
 * @property int $id 控制器类ID
 * @property string $name 控制器类名
 */
class Controller_class extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%controller_class}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 127],
        ];
    }

    public static function listMap(){
        return ArrayHelper::map(static::find()->asArray()->all(), "id", "name");
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '控制器类ID',
            'name' => '控制器类名',
        ];
    }
}
