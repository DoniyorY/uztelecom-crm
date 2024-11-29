<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workers".
 *
 * @property int $id
 * @property int $department_id
 * @property int $company_id
 * @property string|null $fullname_ru
 * @property string $fullname_uz
 * @property string $phone
 * @property string $birthday
 * @property string $passport_series
 * @property string $passport_pinfl
 * @property string $passport_address
 * @property string $passport_end_date
 * @property string|null $address_ru
 * @property string $address_uz
 * @property string|null $image
 * @property int $created
 * @property int $updated
 * @property int $status
 * @property int $worker_status_id
 * @property int $stavka_id
 * @property int $position_id
 */
class Workers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id', 'company_id', 'fullname_uz', 'phone', 'birthday', 'passport_series', 'passport_pinfl', 'passport_address', 'passport_end_date', 'address_uz', 'created', 'updated', 'status', 'worker_status_id', 'stavka_id', 'position_id'], 'required'],
            [['department_id', 'company_id', 'created', 'updated', 'status', 'worker_status_id', 'stavka_id', 'position_id'], 'integer'],
            [['birthday', 'passport_end_date'], 'safe'],
            [['fullname_ru', 'fullname_uz', 'phone', 'passport_series', 'passport_pinfl', 'passport_address', 'address_ru', 'address_uz', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_id' => 'Department ID',
            'company_id' => 'Company ID',
            'fullname_ru' => 'Fullname Ru',
            'fullname_uz' => 'Fullname Uz',
            'phone' => 'Phone',
            'birthday' => 'Birthday',
            'passport_series' => 'Passport Series',
            'passport_pinfl' => 'Passport Pinfl',
            'passport_address' => 'Passport Address',
            'passport_end_date' => 'Passport End Date',
            'address_ru' => 'Address Ru',
            'address_uz' => 'Address Uz',
            'image' => 'Image',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
            'worker_status_id' => 'Worker Status ID',
            'stavka_id' => 'Stavka ID',
            'position_id' => 'Position ID',
        ];
    }
}
