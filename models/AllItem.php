<?php

namespace app\models;
use app\models\Size;
use app\models\Brand;

use Yii;

/**
 * This is the model class for table "allitem".
 *
 * @property integer $ItemID
 * @property integer $DonationID
 * @property double $Price
 * @property integer $BrandID
 * @property integer $IsPriceDec
 * @property integer $IsActive
 * @property string $AddedOn
 * @property integer $AddedBy
 * @property integer $size
 *
 * @property Brand $brand
 * @property Donation $donation
 * @property Size $size0
 * @property Image[] $images
 * @property Itemcategory[] $itemcategories
 * @property Itemcolor[] $itemcolors
 */
class Allitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'allitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DonationID', 'Price', 'AddedBy'], 'required'],
            [['DonationID', 'BrandID', 'IsPriceDec', 'IsActive', 'AddedBy', 'size'], 'integer'],
            [['Price'], 'number'],
            [['AddedOn'], 'safe'],
            [['BrandID'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['BrandID' => 'BrandID']],
            [['DonationID'], 'exist', 'skipOnError' => true, 'targetClass' => Donation::className(), 'targetAttribute' => ['DonationID' => 'DonationID']],
            [['size'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['size' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ItemID' => 'Item ID',
            'DonationID' => 'Donation ID',
            'Price' => 'Price',
            'BrandID' => 'Brand',
            'IsPriceDec' => 'Is Price Dec',
            'IsActive' => 'Active?',
            'AddedOn' => 'Added On',
            'AddedBy' => 'Added By',
            'size' => 'Size',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['BrandID' => 'BrandID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonation()
    {
        return $this->hasOne(Donation::className(), ['DonationID' => 'DonationID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize0()
    {
        return $this->hasOne(Size::className(), ['ID' => 'size']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['ItemID' => 'ItemID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemcategories()
    {
        return $this->hasMany(Itemcategory::className(), ['ItemID' => 'ItemID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemcolors()
    {
        return $this->hasMany(Itemcolor::className(), ['ItemID' => 'ItemID']);
    }

    // public function getSize()
    // {
    //     return Size::find()->where(['size' => $this->ID])->one();
    // }
}
