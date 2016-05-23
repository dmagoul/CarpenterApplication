<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eidos_ksiloy".
 *
 * @property integer $id
 * @property string $perigrafi
 */
class EidosKsiloy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eidos_ksiloy';
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
            'id' => 'ID',
            'perigrafi' => 'Perigrafi',
        ];
    }
}
