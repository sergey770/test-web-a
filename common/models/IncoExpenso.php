<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inco_expenso".
 *
 * @property integer $inc_exp_id
 * @property string $inc_exp_name
 *
 * @property Categories[] $categories
 */
class IncoExpenso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inco_expenso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inc_exp_name'], 'string', 'max' => 50],
            [['inc_exp_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inc_exp_id' => 'Inc Exp ID',
            'inc_exp_name' => 'Inc Exp Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['inc_exp_id' => 'inc_exp_id']);
    }
}
