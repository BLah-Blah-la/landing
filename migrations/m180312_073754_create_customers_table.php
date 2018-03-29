<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customers`.
 * Has foreign keys to the tables:
 *
 * - `price_list`
 */
class m180312_073754_create_customers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('customers', [
            
			'id' => $this->primaryKey(),
            'price_name' => $this->integer(),
            'name' => $this->string(255),
			'surname' => $this->string(255),
			'email' => $this->string(255),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
            'phone_digital' => $this->string(10),
			'name_company' => $this->string(255),
			'status' => $this->string(255),
			'avatar' => $this->string(255),
        ]);

        // creates index for column `price_name`
        $this->createIndex(
            'idx-customers-price_name',
            'customers',
            'price_name'
        );

        // add foreign key for table `price_list`
        $this->addForeignKey(
            'fk-customers-price_name',
            'customers',
            'price_name',
            'price_list',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `price_list`
        $this->dropForeignKey(
            'fk-customers-price_name',
            'customers'
        );

        // drops index for column `price_name`
        $this->dropIndex(
            'idx-customers-price_name',
            'customers'
        );

        $this->dropTable('customers');
    }
}
