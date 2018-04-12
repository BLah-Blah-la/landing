<?php

use yii\db\Migration;

/**
 * Handles the creation of table `notification_customers`.
 * Has foreign keys to the tables:
 *
 * - `customers`
 */
class m180412_083509_create_notification_customers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('notification_customers', [
            'id' => $this->primaryKey(),
            'id_item' => $this->integer(),
            'title' => $this->string(255)->defaultValue("Заказчик"),
			'body' => $this->string(255)->defaultValue("Добавлен новый пользователь"),
        ]);

        // creates index for column `id_item`
        $this->createIndex(
            'idx-notification_customers-id_item',
            'notification_customers',
            'id_item'
        );

        // add foreign key for table `customers`
        $this->addForeignKey(
            'fk-notification_customers-id_item',
            'notification_customers',
            'id_item',
            'customers',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `customers`
        $this->dropForeignKey(
            'fk-notification_customers-id_item',
            'notification_customers'
        );

        // drops index for column `id_item`
        $this->dropIndex(
            'idx-notification_customers-id_item',
            'notification_customers'
        );

        $this->dropTable('notification_customers');
    }
}
