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
 * @property integer $SizeID
 *
 * @property Brand $brand
 * @property Donation $donation
 * @property Size $size
 * @property Image[] $images
 * @property Itemcategory[] $itemcategories
 * @property Itemcolor[] $itemcolors
 */
class AllItem extends \yii\db\ActiveRecord
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
            [['DonationID', 'BrandID', 'IsPriceDec', 'IsActive', 'AddedBy', 'SizeID'], 'integer'],
            [['Price'], 'number'],
            [['AddedOn', 'ItemName'], 'safe'],
            [['BrandID'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['BrandID' => 'BrandID']],
            [['DonationID'], 'exist', 'skipOnError' => true, 'targetClass' => Donation::className(), 'targetAttribute' => ['DonationID' => 'DonationID']],
            [['SizeID'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['SizeID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ItemID' => 'Item ID',
            'DonationID' => 'Donation',
            'Price' => 'Price',
            'BrandID' => 'Brand',
            'IsPriceDec' => 'Price Decrease?',
            'IsActive' => 'Active?',
            'AddedOn' => 'Added On',
            'AddedBy' => 'Added By',
            'SizeID' => 'Size',
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
    public function getSize()
    {
        return $this->hasOne(Size::className(), ['ID' => 'SizeID']);
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

    public function getAddedBy()
    {
        return $this->hasOne(Person::className(), ['PersonID' => 'AddedBy']);
    }

    public function getDonatedBy()
    {
        return $this->donation->addedBy;
    }

    // public function getSize()
    // {
    //     return Size::find()->where(['size' => $this->ID])->one();
    // }
}
