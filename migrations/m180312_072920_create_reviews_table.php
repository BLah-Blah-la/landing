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
            'name' => $this->string(255),
			'surname' => $this->string(255),
			'status' => $this->string(255),
            'text' => $this->text(),
            'image' => $this->string(255),
			'preview' => $this->string(255),

        ]);
    }

    /**
     * @inheritdoc
     */
        // creates index for column `price_name`
		
    public function down()
    {
		$this->dropTable('reviews');
    }
}
