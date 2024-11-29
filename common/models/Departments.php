<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property int $company_id
 * @property string|null $name_ru
 * @property string $name_uz
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'name_uz'], 'required'],
            [['company_id'], 'integer'],
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
            'company_id' => Yii::$app->params['company'][Yii::$app->language],
            'name_ru' => Yii::$app->params['label_name_ru'][Yii::$app->language],
            'name_uz' => Yii::$app->params['label_name_uz'][Yii::$app->language],
        ];
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
