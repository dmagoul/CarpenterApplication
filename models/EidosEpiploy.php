<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eidos_epiploy".
 *
 * @property integer $id
 * @property string $perigrafi
 */
class EidosEpiploy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eidos_epiploy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perigrafi'], 'required'],
            [['perigrafi'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'perigrafi' => 'Περιγραφή',
        ];
    }
}
