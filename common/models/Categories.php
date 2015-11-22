<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $categ_id
 * @property string $categ_name
 * @property integer $inc_exp_id
 * @property string $categ_active_from
 * @property string $categ_active_to
 *
 * @property IncoExpenso $incExp
 * @property FamilyBudget[] $familyBudgets
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inc_exp_id'], 'integer'],
            //[['categ_active_from', 'categ_active_to'], 'safe'],
            [['categ_name'], 'string', 'max' => 50],
            //[['categ_name', 'inc_exp_id', 'categ_active_from'], 'unique', 'targetAttribute' => ['categ_name', 'inc_exp_id', 'categ_active_from'], 'message' => 'The combination of Categ Name, Inc Exp ID and Categ Active From has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categ_id' => 'Categ ID',
            'categ_name' => 'Categ Name',
            'inc_exp_id' => 'Inc Exp ID',
            'categ_active_from' => 'Categ Active From',
            'categ_active_to' => 'Categ Active To',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncExp()
    {
        return $this->hasOne(IncoExpenso::className(), ['inc_exp_id' => 'inc_exp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilyBudgets()
    {
        return $this->hasMany(FamilyBudget::className(), ['categ_id' => 'categ_id']);
    }
}
