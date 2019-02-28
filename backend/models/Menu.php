<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property int $id 菜单ID
 * @property string $name 菜单名称
 * @property string $auth_key 权限码
 * @property int $parent_id 上级ID
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    public static function ToplistMap(){
        $array = static::find()->where(["parent_id" => 0])->asArray()->all();
        $temp = ['0' => '顶级菜单'];
        foreach($array as $key => $value){
            $temp[$value['id']] = $value['name'];
        }

        return $temp;
    }

    public static function getTopMenu(){
        return static::find()->where(["parent_id" => 0])->asArray()->all();
    }

    public static function getAuthorizationMenu($authKey){
        $topMenu = static::getTopMenu();
        foreach($topMenu as $key => $value){
            $temp = static::getChild($value['id']);
            if(\Yii::$app->user->id == 1){
                $topMenu[$key]['child'] = $temp;
                continue;
            };
            foreach($temp as $k =>$v){
                if(in_array(str_replace('/', '@', $v['auth_key']), $authKey)){

                }
            }

        }
        return $topMenu;
    }

    public static function getMenu($parent_id){
        return static::getChild($parent_id);

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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'parent_id'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 127],
            [['auth_key'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '菜单ID',
            'name' => '菜单名称',
            'auth_key' => 'Url与权限码',
            'parent_id' => '上级ID',
        ];
    }

    public static function listMap(){
        return static::find()->asArray()->all();
    }
}
