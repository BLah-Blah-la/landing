<?php

namespace vendor\landing\partner\controllers;

use Yii;
use vendor\landing\partner\models\Customers;
use vendor\landing\partner\models\search\CustomersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vendor\landing\partner\models\search\PriceListSearch;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dektrium\user\filters\AccessRule;
/**
 * OrderController implements the CRUD actions for Orders model.
 */
class CustomersController extends Controller
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
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
		$searchPriceListModel = new PriceListSearch();
		$dataProviderList = $searchPriceListModel->search(Yii::$app->request->queryParams);
        
		return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'searchPriceListModel' => $searchPriceListModel,
			'dataProviderList' => $dataProviderList,
        ]);
    }

    /**
     * Displays a single Orders model.
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
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
        public function actionCreate(){
        $model = new Customers();

        if ($model->load(Yii::$app->request->post())) {

            $uploadedFile = UploadedFile::getInstance($model, 'ava');

            if ($uploadedFile !== null) {
                $path = 'images/Customers/'
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
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())){
			
			$uploadedFile = UploadedFile::getInstance($model, 'ava');
			if ($uploadedFile !== null) {
                $path = 'images/Customers/'
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
     * Deletes an existing Orders model.
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
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
