<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "family_budget".
 *
 * @property integer $fam_bud_id
 * @property integer $categ_id
 * @property integer $cour_mon_id
 * @property string $fam_bud_create
 * @property integer $user_id
 *
 * @property Categories $categ
 * @property CoursesMoney $courMon
 * @property Users $user
 */
class FamilyBudget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'family_budget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categ_id', 'cour_mon_id', 'user_id','summa'], 'integer'],
            [['summa'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fam_bud_id' => 'Fam Bud ID',
            'categ_id' => 'Categ ID',
            'cour_mon_id' => 'Cour Mon ID',
            'fam_bud_create' => 'Fam Bud Create',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCateg()
    {
        return $this->hasOne(Categories::className(), ['categ_id' => 'categ_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourMon()
    {
        return $this->hasOne(CoursesMoney::className(), ['cour_mon_id' => 'cour_mon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }
}
