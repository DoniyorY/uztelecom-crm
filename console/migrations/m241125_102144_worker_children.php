<?php

use yii\db\Migration;

/**
 * Class m241125_102144_worker_children
 */
class m241125_102144_worker_children extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('worker_children', [
            'id' => $this->primaryKey(),
            'worker_id' => $this->integer()->notNull(),
            'fullname' => $this->string()->notNull(),
            'birthday' => $this->integer()->notNull(),
            'created' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241125_102144_worker_children cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241125_102144_worker_children cannot be reverted.\n";

        return false;
    }
    */
}
