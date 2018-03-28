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
            'id_customer' => $this->integer(),
            'image_site' => $this->string(255),
        ]);
    
    /**
     * @inheritdoc
     */
	    $this->createIndex(
            'idx-portfolio-id_customer',
            'portfolio',
            'id_customer'
        );

        // add foreign key for table `price_list`
        $this->addForeignKey(
            'fk-portfolio-id_customer',
            'portfolio',
            'id_customer',
            'customers',
            'id',
            'CASCADE'
        );
	}	
    public function down()
    {
         $this->dropForeignKey(
            'fk-portfolio-id_customer',
            'portfolio'
        );

        // drops index for column `price_name`
        $this->dropIndex(
            'idx-portfolio-id_customer',
            'portfolio'
        );
		
		$this->dropTable('portfolio');
    }
}
