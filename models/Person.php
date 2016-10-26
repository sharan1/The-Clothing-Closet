<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Person".
 *
 * @property integer $PersonID
 * @property string $FirstName
 * @property string $LastName
 * @property string $Type
 * @property string $ContactNum
 * @property string $Address
 * @property string $UserName
 * @property string $Password
 * @property string $PasswordHash
 * @property string $Email
 * @property integer $PrivilegeID
 * @property integer $IsSubscribed
 * @property integer $IsActive
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Address'], 'string'],
            [['PrivilegeID', 'IsSubscribed', 'IsActive'], 'integer'],
            [['FirstName', 'LastName', 'UserName', 'Email'], 'string', 'max' => 30],
            [['Type', 'ContactNum'], 'string', 'max' => 20],
            [['Password', 'PasswordHash'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PersonID' => 'Person ID',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Type' => 'Type',
            'ContactNum' => 'Contact Num',
            'Address' => 'Address',
            'UserName' => 'User Name',
            'Password' => 'Password',
            'PasswordHash' => 'Password Hash',
            'Email' => 'Email',
            'PrivilegeID' => 'Privilege ID',
            'IsSubscribed' => 'Is Subscribed',
            'IsActive' => 'Is Active',
        ];
    }
}
