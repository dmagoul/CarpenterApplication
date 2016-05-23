<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fotografies".
 *
 * @property integer $id
 * @property string $photo
 * @property string $caption
 */
class Fotografies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $file;
    public $secondary_files;
    
    public static function tableName()
    {
        return 'fotografies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo', 'caption'], 'required'],
            [['epiplo_id'],'integer'],
            [['photo'], 'string', 'max' => 500],
            [['caption'], 'string', 'max' => 100],
            [['file'], 'file'],
            [['secondary_files'], 'file', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'caption' => 'Caption',
            'epiplo_id' => 'epiplo_id',
            'file' => 'Αρχείο φωτογραφίας',
            'secondary_files' => 'Αρχεία δευτερεύουσων φωτογραφιών: Προσθήκη νέων',
        ];
    }
}
