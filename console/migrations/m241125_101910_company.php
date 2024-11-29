<?php

use yii\db\Migration;

/**
 * Class m241125_101910_company
 */
class m241125_101910_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'region_id'=>$this->integer()->notNull(),
            'name_ru'=>$this->string()->null(),
            'name_uz'=>$this->string()->notNull(),
            'created'=>$this->integer()->notNull(),
            'status'=>$this->integer()->notNull()->defaultValue(0),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241125_101910_company cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241125_101910_company cannot be reverted.\n";

        return false;
    }
    */
}
