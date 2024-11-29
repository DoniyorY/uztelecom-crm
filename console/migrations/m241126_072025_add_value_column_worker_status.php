<?php

use yii\db\Migration;

/**
 * Class m241126_072025_add_value_column_worker_status
 */
class m241126_072025_add_value_column_worker_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('worker_status', 'value', $this->integer()->defaultValue(0)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241126_072025_add_value_column_worker_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241126_072025_add_value_column_worker_status cannot be reverted.\n";

        return false;
    }
    */
}
