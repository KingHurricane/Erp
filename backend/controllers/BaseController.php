<?php

namespace backend\controllers;
use backend\models\Emp;
use \Yii;
use yii\web\ForbiddenHttpException;

class BaseController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if(parent::beforeAction($action)){

            if(Yii::$app->user->id == 1){
                return true;
            }

            $allowed = [
                'site' => ['login', 'captcha', 'error'],
            ];

            if(array_key_exists(Yii::$app->controller->id, $allowed)){
                if(in_array(Yii::$app->controller->action->id, $allowed[Yii::$app->controller->id])){
                    return true;
                }
            }

            if(Yii::$app->user->getIsGuest()){
                Yii::$app->user->loginRequired();
                return false;
            }

           if("site@index" == Yii::$app->controller->id.'@'.Yii::$app->controller->action->id ||
               "site@logout" == Yii::$app->controller->id.'@'.Yii::$app->controller->action->id
           ){
                return true;
           }

            $authKey = Emp::getAuthKeyByEmpID(Yii::$app->user->id);
//            var_dump($authKey);
//            var_dump(Yii::$app->controller->id.'@'.Yii::$app->controller->action->id);exit();

            if(!in_array(Yii::$app->controller->id.'@'.Yii::$app->controller->action->id, $authKey)){
                throw new ForbiddenHttpException("未经授权");
            }

            return true;
        }else{
            return false;
        }
    }

}
