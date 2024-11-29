<?php

use yii\db\Migration;

/**
 * Class m241125_102054_worker_availability
 */
class m241125_102054_worker_availability extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('worker_availability', [
            'id' => $this->primaryKey(),
            'worker_id'=>$this->integer()->notNull(),
            'type_id'=>$this->integer()->notNull(),
            'day_start'=>$this->integer()->notNull(),
            'day_end'=>$this->integer()->notNull(),
            'content'=>$this->text()->notNull(),
            'image'=>$this->string()->null(),
            'created'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241125_102054_worker_availability cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241125_102054_worker_availability cannot be reverted.\n";

        return false;
    }
    */
}
