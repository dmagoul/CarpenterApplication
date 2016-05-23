<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xrwma_epiploy".
 *
 * @property integer $id
 * @property string $perigrafi
 * @property string $palette_code
 */
class XrwmaEpiploy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xrwma_epiploy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perigrafi', 'palette_code'], 'required'],
            [['perigrafi', 'palette_code'], 'string', 'max' => 10],
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
            'palette_code' => 'Palette Code',
        ];
    }
}
