<?php

namespace backend\controllers;

use backend\models\Controller_method;
use Yii;
use backend\models\Privilege;
use backend\models\PrivilegeSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrivilegeController implements the CRUD actions for Privilege model.
 */
class PrivilegeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Privilege models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrivilegeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Privilege model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Privilege model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Privilege();

        if ($model->load(Yii::$app->request->post())) {
            if($model->add()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'controller_methods' => Controller_method::listMap(),
        ]);
    }

    /**
     * Updates an existing Privilege model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $temp = Yii::$app->request->post();

//        if(!empty( $temp['Privilege']['parent_id'])){
//            $temp['Privilege']['parent_id'] = (int)$temp['Privilege']['parent_id'];
//        }

        if ($model->load($temp)) {
            if($model->edit()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'controller_methods' => Controller_method::listMap(),
            'method_checked_ids' => implode(',',Privilege::getAuthCodeIDsByPrivilegeID($model->id)),
        ]);
    }

    /**
     * Deletes an existing Privilege model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try{
            $transaction = \YII::$app->db->beginTransaction();

            $model = $this->findModel($id);
            $parent_id = $model->parent_id;
            $model->delete();

            $parent = Privilege::find()->where(['id' => $parent_id])->one();
            if(Privilege::getChild($parent['id']) === []){
                $parent['has_child'] = 0;
                $parent->save();
            }

            $transaction->commit();
        }catch(\PDOException $e){
            $transaction->rollBack();
            \YII::$app->session->setFlash("error", $e->getMessage());
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the Privilege model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Privilege the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Privilege::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionControllerMethods(){
        echo json_encode(Controller_method::listMap(\YII::$app->request->post("id"))) ;
    }

    public function actionAlreadyChecked(){
        return json_encode(Privilege::getCheckedMethods(\YII::$app->request->post("id"), \YII::$app->request->post("class")));
    }
}
