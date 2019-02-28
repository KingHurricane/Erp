<?php

namespace backend\controllers;

use backend\models\Controller_class;
use backend\models\Controller_methods;

class CollectController extends \yii\web\Controller
{
    public function actionCollect()
    {
        $dp = opendir("/www2/backend/controllers");
        while($file = readdir($dp)){
            if($file == '.' || $file == '..' || $file == "CollectController.php"){
                continue;
            }

            if(is_file(__DIR__."/".$file)){

                $temp = explode(".", $file);

                $controller_class = new Controller_class();
                $controller_class->name = trim(strtolower(str_replace("Controller","", $temp[0])));
                $controller_class->save();

                $reflecation = new \ReflectionClass("backend\controllers\\".$temp[0]);
                $methods = $reflecation->getMethods();
                $temp = [];
                $temp2 = [];

                foreach($methods as $key => $value){
                    if(strchr($value->name, "action") && $value->name != "actions"){
                        $temp2["name"] = trim(strtolower(str_replace("action", "", $value->name)));
                        $temp2["controller_class_id"] = $controller_class->id;
                        $temp[] = $temp2;
                        $temp2 = [];
                    }
                }

                $controller_id = strtolower(str_replace("Controller.php", "", $file));
                foreach(\YII::$app->createControllerByID($controller_id)->actions() as $key => $value){
                    $temp2["name"] = $key;
                    $temp2["controller_class_id"] = $controller_class->id;
                    $temp[] = $temp2;
                }

                \YII::$app->db->createCommand()->batchInsert("{{%controller_methods}}", ["name", "controller_class_id"], $temp)->execute();
            }
        }
    }

}
