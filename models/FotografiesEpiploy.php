<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fotografies_epiploy".
 *
 * @property integer $id
 * @property integer $id_epiploy
 * @property integer $id_fotografias
 */
class FotografiesEpiploy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fotografies_epiploy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_epiploy', 'id_fotografias'], 'required'],
            [['id_epiploy', 'id_fotografias'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_epiploy' => 'Id Epiploy',
            'id_fotografias' => 'Id Fotografias',
            'files' => 'Αρχεία δευτερεύουσων φωτογραφιών',
        ];
    }
}
