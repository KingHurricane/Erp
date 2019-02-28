<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%supplier_category}}".
 *
 * @property int $supplier_id 供应商ID
 * @property int $category_id 商品类别ID
 */
class SupplierCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%supplier_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['supplier_id', 'category_id'], 'required'],
            [['supplier_id', 'category_id'], 'integer'],
            [['supplier_id', 'category_id'], 'unique', 'targetAttribute' => ['supplier_id', 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'supplier_id' => '供应商ID',
            'category_id' => '商品类别ID',
        ];
    }
}
