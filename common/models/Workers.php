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

    public $imageFile;

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
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_id' => 'Отдел',
            'company_id' => 'Филиал',
            'fullname_ru' => 'Ф.И.О на русском',
            'fullname_uz' => 'Ф.И.О',
            'phone' => 'Номер телефона',
            'birthday' => 'Дата рождения',
            'passport_series' => 'Серия паспорта',
            'passport_pinfl' => 'ПИНФЛ',
            'passport_address' => 'Кем выдан',
            'passport_end_date' => 'Дата окончания паспорта',
            'address_ru' => 'Адрес на русском',
            'address_uz' => 'Адрес на узбекском',
            'image' => 'Фотография',
            'imageFile' => 'Фотография',
            'created' => 'Дата создания',
            'updated' => 'Дата обновления',
            'status' => 'Статус',
            'worker_status_id' => 'Статус Сотрудника',
            'stavka_id' => 'Ставка',
            'position_id' => 'Должность',
        ];
    }

    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'department_id']);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public function getWorkerStatus()
    {
        return $this->hasOne(WorkerStatus::className(), ['id' => 'worker_status_id']);
    }

    public function getPosition()
    {
        return $this->hasOne(Positions::className(), ['id' => 'position_id']);
    }
}
