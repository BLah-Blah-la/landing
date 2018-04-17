<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\Html;
use frontend\models\Customers;
use frontend\models\Callback;
use frontend\models\lopez;
use frontend\models\Notifications;
use common\models\AccountNotification;

/**
 * Site controller
 */
class PartnerController extends Controller
{
	/**
     * @inheritdoc
     */
	public $layout = "partner";
	
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    
					[
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex(){
		
        $model = Yii::createObject(Model::className());
		
		$customers = new Customers();
		
		$notifications = new Notifications();
		
		$callback = new Callback();

		$menager = $model->all();
		
		if (Html::encode($customers->load(Yii::$app->request->post())) && $customers->save()) {
			
		    $user = $notifications->maximum();
		    	
			AccountNotification::create(AccountNotification::KEY_NEW_ACCOUNT, ['user' => $user])->send();
			
			Yii::$app->session->setFlash('success', 'Поздравляю, вы оставили заявку');
			
            $this->redirect('/');
			
			return;
        }
		
		if(Html::encode($callback->load(Yii::$app->request->post())) && $callback->save())
		{
			$user = $notifications->maximumCallback();
		    	
			AccountNotification::create(AccountNotification::KEY_NEW_ACCOUNT, ['user' => $user])->send2();
			
			Yii::$app->session->setFlash('success', 'Поздравляю, вы оставили заявку');
			
            $this->redirect('/');
			
			return;

		}
		
		return $this->render('index', ['customers' => $customers, 'callback' => $callback, 'menager' => $menager]); 
		
	}
	public function actionLogin(){
		
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }
		
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', ['model' => $model]);
    }
    public function actionSome(){
		$model = new Review();
		return $this->render('some', ['model'=>$model]);
	}
	public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }
	
		public function actionPsg(){
			
		 $time = date('H:i:s');
         return $this->render('psg', ['time' => $time]);

	}
	public function actionEdi()
    {
 
     return $this->render('mo');
    }

}