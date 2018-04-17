<?php

use yii\db\Migration;

/**
 * Handles the creation of table `portfolio`.
 */
class m180312_072230_create_portfolio_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('portfolio', [
            'id' => $this->primaryKey(),
            'image_site' => $this->string(255),
			'name_company' => $this->string(255),
			'preview' => $this->string(255),
			
        ]);
    
	}
    public function down()
	{
		
		$this->dropTable('portfolio');
    }
}
