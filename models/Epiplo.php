<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "epiplo".
 *
 * @property integer $id
 * @property string $perigrafi
 * @property integer $id_eidos_epiploy
 * @property integer $id_typos_epiploy
 * @property integer $id_eidos_ksiloy
 * @property integer $id_chroma
 * @property integer $id_main_photo
 */
class Epiplo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    
    
    public static function tableName()
    {
        return 'epiplo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perigrafi', 'id_eidos_epiploy', 'id_typos_epiploy', 'id_eidos_ksiloy', 'id_chroma'], 'required'],
            [['id_eidos_epiploy', 'id_typos_epiploy', 'id_eidos_ksiloy', 'id_chroma', 'id_main_photo'], 'integer'],
            [['perigrafi'], 'string', 'max' => 100],
            
        ];
    }
    
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'MainPhoto' => array(self::BELONGS_TO, 'Fotografies', 'id'),
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'perigrafi' => 'Περιγραφή',
            'id_eidos_epiploy' => 'Είδος',
            'id_typos_epiploy' => 'Τύπος',
            'id_eidos_ksiloy' => 'Ξύλο',
            'id_chroma' => 'Χρώμα',
            'id_main_photo' => 'Φωτογραφία',
        ];
    }


    public function getFotografiesFotografia()
    {
        return $this->hasOne(Fotografies::className(), ['id' => 'id_main_photo']);
    }
    
    public function getEidos_epiployEidos_epiploy()
    {
        return $this->hasOne(EidosEpiploy::className(), ['id' => 'id_eidos_epiploy']);
    }
    
    public function getTypos_epiployTypos_epiploy()
    {
        return $this->hasOne(TyposEpiploy::className(), ['id' => 'id_typos_epiploy']);
    }
    
    public function getEidos_ksiloyEidos_ksiloy()
    {
        return $this->hasOne(EidosKsiloy::className(), ['id' => 'id_eidos_ksiloy']);
    }
    
    public function getXrwma_epiployXrwma_epiploy()
    {
        return $this->hasOne(XrwmaEpiploy::className(), ['id' => 'id_chroma']);
    }
    
    public function getFotografies()
    {
        //return $this->hasOne(Fotografies::className(), ['epiplo_id' => 'id_main_photo']);
        return $this->hasOne(Fotografies::className(), ['id' => 'id_main_photo']);
    }
     
    
   

}
