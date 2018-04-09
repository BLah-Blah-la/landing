<?php

namespace vendor\landing\partner\controllers;

use Yii;
use vendor\landing\partner\models\Advantages;
use vendor\landing\partner\models\search\AdvantagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\get;
use yii2mod\linkpreview\actions\LinkPreviewAction;
/**
 * AdvantagesController implements the CRUD actions for Advantages model.
 */
class AdvantagesController extends Controller
{
    /**
     * @inheritdoc
     */
	const EVENT_AFTER_LOGIN = 'afterAction';

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
    
	public function actions(){
		return [
		'link-preview' => LinkPreviewAction::className()
		];
		}
	
    /**
     * Lists all Advantages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvantagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advantages model.
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
     * Creates a new Advantages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advantages();
         
        if ($model->load(Yii::$app->request->post())) {

            $uploadedFile = UploadedFile::getInstance($model, 'img');

            if ($uploadedFile !== null) {
                $path = 'images/Advantages/'
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
     * Updates an existing Advantages model.
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
                $path = 'images/Advantages/'
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
     * Deletes an existing Advantages model.
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
     * Finds the Advantages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advantages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advantages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
