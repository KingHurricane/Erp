<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%supplier}}".
 *
 * @property int $id 供应商ID
 * @property string $name 供应商名称
 * @property string $address 地址
 * @property string $contact 联系人
 * @property string $tele 电话
 * @property int $transport 送货方式:0-自行运输, 1-发货方快递, 2-发货方货运
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%supplier}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'contact', 'tele', 'transport'], 'required'],
            [['transport'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['contact', 'tele'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '供应商ID',
            'name' => '供应商名称',
            'address' => '地址',
            'contact' => '联系人',
            'tele' => '电话',
            'transport' => '送货方式',
        ];
    }

    public function add()
    {
        $category = Yii::$app->request->post("Supplier")['category'];
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $this->save();

            $temp = [];
            $list = [];
            foreach($category as $key => $value){
                $temp['category_id'] = $value;
                $temp['supplier_id'] = $this->id;
                $list[] = $temp;
            }

            Yii::$app->db->createCommand()
                ->batchInsert('{{%supplier_category}}', ['category_id', 'supplier_id'], $list)
                ->execute();

            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    public function edit()
    {
        $category = Yii::$app->request->post("Supplier")['category'];
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $this->save();

            $temp = [];
            $list = [];
            foreach($category as $key => $value){
                $temp['category_id'] = $value;
                $temp['supplier_id'] = $this->id;
                $list[] = $temp;
            }

            SupplierCategory::deleteAll(["supplier_id" => $this->id]);
            Yii::$app->db->createCommand()
                ->batchInsert('{{%supplier_category}}', ['category_id', 'supplier_id'], $list)
                ->execute();

            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    public static function getCategoryBySupplierID($id){

        $temp = static::find()->where(["id" => $id])->with("category")->asArray()->one()['category'];
        if(!empty($temp)){
            $temp = ArrayHelper::getColumn($temp,'id');
        }

        return $temp;
    }

    public function getCategory(){
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->via('supplierCategory');
    }

    public function getSupplierCategory(){
        return $this->hasMany(SupplierCategory::className(), ["supplier_id" => "id"]);
    }
}
