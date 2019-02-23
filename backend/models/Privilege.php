<?php

namespace backend\models;

use function Symfony\Component\Debug\Tests\testHeader;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%privilege}}".
 *
 * @property int $id 权限ID
 * @property string $name 权限名称
 * @property string $key 权限码
 * @property int $parent_id 上级权限ID, 0代表顶级权限
 * @property int $has_child 是否拥有子权限
 */
class Privilege extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%privilege}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'key', 'parent_id'], 'required'],
//            [['parent_id', 'has_child'], 'integer'],
//            ['parent_id', 'filter', 'filter' => function($value){ return (int)$value;}],
            [['name'], 'string', 'max' => 127],
            [['key'], 'safe'],
        ];
    }

    public static function ToplistMap(){
        return ArrayHelper::map(static::find()->where(["parent_id" => 0])->asArray()->all(), "id", "name");
    }

    public static function listMap(){
        return ArrayHelper::map(static::find()->asArray()->all(), "id", "name");
    }

    public function add()
    {
        try{

            $transaction = \YII::$app->db->beginTransaction();
            $this->key = implode(',', $this->key);
            $this->has_child = 0;
            $this->save();

            if(($parent_model = static::find()->where(["id" => $this->parent_id])->one()) !== null ){
                $parent_model->has_child = 1;
                $parent_model->save();
            }

            $transaction->commit();
            return true;
        }catch(\PDOException $e){

            $transaction->rollBack();
            \YII::$app->session->setFlash("error", $e->getMessage());
            return false;
        }

    }

    public function edit(){
        try{
            $dirtyAttributes = $this->getDirtyAttributes();
            $oldAttributeParentID = $this->oldAttributes['parent_id'];

            $transaction = \YII::$app->db->beginTransaction();

            if(!empty($this->key)){
                if(!is_array($this->key)){
                    $this->key = [$this->key];
                }
                $this->key = implode(",", $this->key);
            }
            $this->save();

            if(key_exists('parent_id', $dirtyAttributes)){
                  $parent = static::find()->where(['id' => $oldAttributeParentID])->one();
                  if(static::getChild($parent['id']) === []){
                    $parent['has_child'] = 0;
                    $parent->save();
                }
            }

            if(($parent_model = static::find()->where(["id" => $this->parent_id])->one()) !== null ){
                $parent_model->has_child = 1;
                $parent_model->save();
            }

            $transaction->commit();
            return true;
        }catch(\PDOException $e){

            $transaction->rollBack();
            \YII::$app->session->setFlash("error", $e->getMessage());
            return false;
        }
    }

    public static function getCheckedMethods($id, $class){
        $code_str = static::find()->where(["id" => $id])->asArray()->one()["key"];
        $code = explode(",", $code_str);
        $temp = [];
        $temp2 = [];
        foreach($code as $key => $value){
            if(empty($value)){
                continue;
            }

            $temp = explode("@", $value);
            if($temp[0] == $class){
                $temp2[] = $temp[1];
            }
        }

        return $temp2;
    }

    public static function getChild($parent_id){
        if(($temp = static::find()->where(["parent_id" => $parent_id])->asArray()->all()) !== []){
            foreach($temp as $key => $value){
                $value['child'] = static::getChild($value['id']);
                $temp[$key] = $value;
            }
            return $temp;
        }

        return [];

    }

    public static function getAuthCodeIDsByPrivilegeID($id){
        $code = (static::findOne($id))->key;
        $temp = [];

        foreach(explode(',',$code) as $key => $value){
            if(empty($value)){
                continue;
            }
            $ids = explode('_', $value)[1];
            $temp[] = $ids;
        }
        return $temp;
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '权限ID',
            'name' => '权限名称',
            'key' => '权限码',
            'parent_id' => '上级权限ID, 0代表顶级权限',
            'has_child' => '是否拥有子权限',
        ];
    }


}
