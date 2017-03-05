<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_m_kas".
 *
 * @property integer $id
 * @property string $no_kas
 * @property string $tgl_kas
 *
 * @property TbDKas[] $tbDKas
 */
class TbMKas extends \yii\db\ActiveRecord
{
 use \mdm\behaviors\ar\RelationTrait; 
    /**
     * @inheritdoc
     */
 
     public function behaviors()
{
    return [
        [
            'class' => 'mdm\autonumber\Behavior',
            'attribute' => 'no_kas', // required
            'group' =>'Kas',
            'value' => 'Kas/'.date('m/Y').'/?' , // format auto number. '?' will be replaced with generated number
            'digit' => 4 // optional, default to null. 
        ],
       
    ];
}

    public static function tableName()
    {
        return 'tb_m_kas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_kas'], 'required'],
            [['tgl_kas','no_kas'], 'safe'],
            [['no_kas'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_kas' => 'No Kas',
            'tgl_kas' => 'Tgl Kas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
     public function getDetKases()
    {
        return $this->hasMany(DetKas::classname(), ['id_m_kas'=>'id']);
    
    }        
  
    public function  setDetKases($value)
    {
       
        $this->loadRelated('detKases',$value);
    
    }


    public function getTot_Debet()
    {
        $x=0;    
        if ($this->isNewRecord) {
            return $x; // This avoid calling a query searching for null primary keys.
        }
        
          foreach($this->detKases as $detail)
          {
              $x=$x+$detail->debet_rp;
          }    
     
     
        return $x;
    }
    
     public function getTot_Kredit()
    {
        $x=0;    
        if ($this->isNewRecord) {
            return $x; // This avoid calling a query searching for null primary keys.
        }
        
          foreach($this->detKases as $detail)
          {
              $x=$x+$detail->kredit_rp;
          }    
     
     
        return $x;
    }
}