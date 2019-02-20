<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%dep}}".
 *
 * @property int $id 部门ID
 * @property string $name 部门名称
 * @property string $tele
 */
class Dep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dep}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tele'], 'required'],
            [['name'], 'string', 'max' => 127],
            [['tele'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '部门ID',
            'name' => '部门名称',
            'tele' => '电话号码',
        ];
    }

    public static function depArray(){
        $dep = Dep::find()->asArray()->all();
        return ArrayHelper::map($dep, 'id', 'name');
    }
}
