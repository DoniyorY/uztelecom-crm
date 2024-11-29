<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int $region_id
 * @property string|null $name_ru
 * @property string $name_uz
 * @property int $created
 * @property int $status
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'name_uz', 'created'], 'required'],
            [['region_id', 'created', 'status'], 'integer'],
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
            'region_id' => Yii::$app->params['regions'][Yii::$app->language],
            'name_ru' => Yii::$app->params['label_name_ru'][Yii::$app->language],
            'name_uz' => Yii::$app->params['label_name_uz'][Yii::$app->language],
            'created' => Yii::$app->params['label_created'][Yii::$app->language],
            'status' => Yii::$app->params['label_status'][Yii::$app->language],
        ];
    }

    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }
}
