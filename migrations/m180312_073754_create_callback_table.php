<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customers`.
 * Has foreign keys to the tables:
 *
 * - `price_list`
 */
class m180312_073754_create_callback_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('callback', [
            
			'id' => $this->primaryKey(),
            'name' => $this->string(255),
			'email' => $this->string(255),
            'phone_digital' => $this->string(10),
			'status' => $this->string(255),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('callback');
    }
}
