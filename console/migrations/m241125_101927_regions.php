<?php

use yii\db\Migration;

/**
 * Class m241125_101927_regions
 */
class m241125_101927_regions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('regions',[
            'id' => $this->primaryKey(),
            'name_ru'=>$this->string()->null(),
            'name_uz'=>$this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241125_101927_regions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241125_101927_regions cannot be reverted.\n";

        return false;
    }
    */
}
