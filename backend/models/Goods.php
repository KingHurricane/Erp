<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property int $id 商品ID
 * @property string $name 商品名称
 * @property string $origin 产地
 * @property string $producer 生产厂家
 * @property string $unit 计量单位
 * @property double $inPrice 进货价
 * @property double $outPrice 出货价
 * @property int $category_id 商品类别ID
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'origin', 'producer', 'unit', 'inPrice', 'outPrice', 'category_id'], 'required'],
            [['inPrice', 'outPrice'], 'number'],
            [['category_id'], 'integer'],
            [['name', 'origin', 'producer', 'unit'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '商品ID',
            'name' => '商品名称',
            'origin' => '产地',
            'producer' => '生产厂家',
            'unit' => '计量单位',
            'inPrice' => '进货价',
            'outPrice' => '出货价',
            'category_id' => '商品类别',
        ];
    }
}
