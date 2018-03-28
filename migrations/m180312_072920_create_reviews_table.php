<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reviews`.
 */
class m180312_072920_create_reviews_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reviews', [
            'id' => $this->primaryKey(),
			'id_customer' => $this->integer(),
            'text' => $this->text(),
            'image_site' => $this->string(255),
        ]);
    

    /**
     * @inheritdoc
     */
        // creates index for column `price_name`
        $this->createIndex(
            'idx-reviews-id_customer',
            'reviews',
            'id_customer'
        );

        // add foreign key for table `price_list`
        $this->addForeignKey(
            'fk-reviews-id_customer',
            'reviews',
            'id_customer',
            'customers',
            'id',
            'CASCADE'
        );
	}	
    public function down()
    {
        // drops foreign key for table `price_list`
        $this->dropForeignKey(
            'fk-reviews-id_customer',
            'reviews'
        );

        // drops index for column `price_name`
        $this->dropIndex(
            'idx-reviews-id_customer',
            'reviews'
        );
		
		$this->dropTable('reviews');
    }
}
