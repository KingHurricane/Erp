<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property int $id 角色ID
 * @property string $name 角色名称
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%role}}';
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
        $list = static::find()->asArray()->all();
        return ArrayHelper::map($list, "id", "name");
    }


    public function add()
    {
        try{
            $transaction = \YII::$app->db->beginTransaction();
            $this->save();

            $temp = [];
            $temp2 = [];
            foreach(\YII::$app->request->post("Role")['privilege'] as $key => $value){
                $temp2["role_id"] = $this->id;
                $temp2["privilege_id"] = $value;
                $temp[] = $temp2;
            }

            \YII::$app->db->createCommand()->batchInsert("{{%role_privilege}}", ["role_id", "privilege_id"], $temp)->execute();

            $transaction->commit();
            return true;
        }catch (\PDOException $e){
            $transaction->rollBack();
            \YII::$app->session->setFlash("error", $e->getMessage());
            return false;
        }
    }

    public function edit()
    {
        try{
            $transaction = \YII::$app->db->beginTransaction();
            $this->save();

            $temp = [];
            $temp2 = [];
            foreach(\YII::$app->request->post("Role")["privilege"] as $key => $value){
                $temp2["role_id"] = $this->id;
                $temp2["privilege_id"] = $value;
                $temp[] = $temp2;
            }

            $commond = \YII::$app->db->createCommand("delete from {{%role_privilege}} where role_id = :role_id");
            $commond->bindValue(":role_id", $this->id)->execute();

            \YII::$app->db->createCommand()->batchInsert("{{%role_privilege}}", ["role_id", "privilege_id"], $temp)->execute();

            $transaction->commit();
            return true;
        }catch (\PDOException $e){
            $transaction->rollBack();
            \YII::$app->session->setFlash("error", $e->getMessage());
            return false;
        }
    }

    public static function roleList(){
        $role = static::find()->asArray()->all();
        return ArrayHelper::map($role, 'id', 'name');
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '角色ID',
            'name' => '角色名称',
        ];
    }




}
