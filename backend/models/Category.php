<?php

namespace backend\models;

use Overtrue\Pinyin\Pinyin;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id 类别ID
 * @property string $name 类别名称
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
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
        $temp = ArrayHelper::map(static::find()->asArray()->all(), 'id', 'name');

        $pinyin = new Pinyin();
        $pinyinArray = [];
        foreach($temp as $key => $value){
            $first_hanzi_word = mb_substr($value, 0, 1);
            $first_pinyin_word = strtoupper($pinyin->abbr($first_hanzi_word));
            $pinyinArray[$first_pinyin_word][$key] = $value;
        }
        return $pinyinArray;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '类别ID',
            'name' => '类别名称',
        ];
    }
}
