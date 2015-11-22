<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "courses_money".
 *
 * @property integer $cour_mon_id
 * @property string $cour_mon_name
 *
 * @property FamilyBudget[] $familyBudgets
 */
class CoursesMoney extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'courses_money';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cour_mon_name'], 'string', 'max' => 50],
            [['cour_mon_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cour_mon_id' => 'Cour Mon ID',
            'cour_mon_name' => 'Cour Mon Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilyBudgets()
    {
        return $this->hasMany(FamilyBudget::className(), ['cour_mon_id' => 'cour_mon_id']);
    }
}
