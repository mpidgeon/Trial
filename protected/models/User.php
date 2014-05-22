<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $dateofbirth
 * @property string $email
 * @property string $company
 * @property string $password
 * @property string $primaryAddressTag
 * @property string $phonenumber
 * @property string $mobilenumber
 * @property string $activkey
 * @property string $create_at
 * @property string $lastvisit_at
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property TblAddressbook[] $tblAddressbooks
 * @property TblTaxjurisdiction $tblTaxjurisdiction
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, title, firstname, lastname, dateofbirth, email, company, password, primaryAddressTag, phonenumber, mobilenumber, create_at', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('username, phonenumber, mobilenumber', 'length', 'max'=>20),
			array('title', 'length', 'max'=>8),
			array('firstname, lastname', 'length', 'max'=>50),
			array('email', 'length', 'max'=>128),
			array('company, password', 'length', 'max'=>64),
			array('primaryAddressTag', 'length', 'max'=>16),
			array('activkey', 'length', 'max'=>32),
			array('lastvisit_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, title, firstname, lastname, dateofbirth, email, company, password, primaryAddressTag, phonenumber, mobilenumber, activkey, create_at, lastvisit_at, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tblAddressbooks' => array(self::HAS_MANY, 'TblAddressbook', 'userid'),
			'tblTaxjurisdiction' => array(self::HAS_ONE, 'TblTaxjurisdiction', 'userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'title' => 'Title',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'dateofbirth' => 'Dateofbirth',
			'email' => 'Email',
			'company' => 'Company',
			'password' => 'Password',
			'primaryAddressTag' => 'Primary Address Tag',
			'phonenumber' => 'Phonenumber',
			'mobilenumber' => 'Mobilenumber',
			'activkey' => 'Activkey',
			'create_at' => 'Create At',
			'lastvisit_at' => 'Lastvisit At',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('dateofbirth',$this->dateofbirth,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('primaryAddressTag',$this->primaryAddressTag,true);
		$criteria->compare('phonenumber',$this->phonenumber,true);
		$criteria->compare('mobilenumber',$this->mobilenumber,true);
		$criteria->compare('activkey',$this->activkey,true);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('lastvisit_at',$this->lastvisit_at,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
