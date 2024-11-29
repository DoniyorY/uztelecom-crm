<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string $name_uz
 */
class Positions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz'], 'required'],
            [['name_ru', 'name_uz'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => Yii::$app->params['label_name_ru'][Yii::$app->language],
            'name_uz' => Yii::$app->params['label_name_uz'][Yii::$app->language],
        ];
    }
}
