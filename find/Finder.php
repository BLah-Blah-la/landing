<?php
namespace vendor\landing\partner\find;

use vendor\landing\partner\models\Logo;
use vendor\landing\partner\models\Advantages;
use vendor\landing\partner\models\Contacts;
use vendor\landing\partner\models\Steps;
use vendor\landing\partner\models\PriceList;

use yii\db\ActiveRecord;

class Finder extends ActiveRecord
{
	public function findLogo(){
		
		return Logo::find()->where(['id' => 1])->all();
		
	}
	
	public function findAdvantages(){
		
		return Advantages::find()->all();
		
	}
	
	public function findContacts(){
		
		return Contacts::find()->all();
		
	}
	
	public function findSteps(){
		
		return Steps::find()->all();
		
	}
	
	public function findPriceList(){
		
		return PriceList::find()->all();
		
	}
}
?>