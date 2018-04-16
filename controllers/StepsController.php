<?php

namespace vendor\landing\partner\controllers;

use Yii;
use vendor\landing\partner\models\Steps;
use vendor\landing\partner\models\search\StepsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use dektrium\user\filters\AccessRule;
/**
 * StepsController implements the CRUD actions for Steps model.
 */
class StepsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['switch'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['Superadmin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Steps models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StepsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Steps model.
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
     * Creates a new Steps model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Steps();

        if ($model->load(Yii::$app->request->post())) {

            $uploadedFile = UploadedFile::getInstance($model, 'img');

            if ($uploadedFile !== null) {
                $path = 'images/Steps/'
                    . Yii::$app->security->generateRandomString()
                    . '.' . $uploadedFile->extension;
                
                if ($model->validate()) {
                    $model->upload($path);
					
                    $uploadedFile->saveAs('partner/' . $path);
                }
            }
            if ($model->save()) {

               return $this->redirect(['view', 'id' => $model->id]);

            }
        }            

        return $this->render('create', [
            'model' => $model
            ]);
    }

    /**
     * Updates an existing Steps model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())){
			
			$uploadedFile = UploadedFile::getInstance($model, 'img');
			if ($uploadedFile !== null) {
                $path = 'images/Steps/'
                    . Yii::$app->security->generateRandomString()
                    . '.' . $uploadedFile->extension;
                
                if ($model->validate()) {
                    $model->upload($path);
                    $uploadedFile->saveAs('partner/' . $path);
                }
            }
			
			
		 if($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Steps model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Steps model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Steps the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Steps::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
