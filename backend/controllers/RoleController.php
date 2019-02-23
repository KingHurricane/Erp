<?php

namespace backend\controllers;

use backend\models\Privilege;
use backend\models\RolePrivilege;
use Yii;
use backend\models\Role;
use backend\models\RoleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends Controller
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
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Role model.
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
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Role();

        if ($model->load(Yii::$app->request->post()) ) {
            if($model->add()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

//        var_dump(Privilege::getChild(0));exit();
        return $this->render('create', [
            'model' => $model,
            'privileges' => Privilege::getChild(0),
            'privilege_checked' => RolePrivilege::privilegeIdsByRole($model->id),
        ]);
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            if($model->edit()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'privileges' => Privilege::getChild(0),
            'privilege_checked' => RolePrivilege::privilegeIdsByRole($model->id),
        ]);
    }

    /**
     * Deletes an existing Role model.
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
            $model->delete();

            $commond = \YII::$app->db->createCommand("delete from {{%role_privilege}} where role_id = :role_id");
            $commond->bindValue(":role_id", $model->id)->execute();

            $transaction->commit();
        }catch(\PDOException $e){
            $transaction->rollBack();
            \YII::$app->session->setFlash("error", $e->getMessage());
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the Role model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Role the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Role::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
