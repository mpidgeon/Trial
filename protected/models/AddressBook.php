<?php

/**
 * This is the model class for table "tbl_addressbook".
 *
 * The followings are the available columns in table 'tbl_addressbook':
 * @property integer $userid
 * @property string $tag
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $region
 * @property string $zipcode
 * @property string $country
 *
 * The followings are the available model relations:
 * @property TblUser $user
 */
class AddressBook extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_addressbook';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, tag, address1, address2, city, region, zipcode, country', 'required'),
			array('userid', 'numerical', 'integerOnly'=>true),
			array('tag', 'length', 'max'=>16),
			array('address1', 'length', 'max'=>8),
			array('address2, city, region', 'length', 'max'=>50),
			array('zipcode', 'length', 'max'=>128),
			array('country', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userid, tag, address1, address2, city, region, zipcode, country', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'TblUser', 'userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'UserId',
			'tag' => 'Tag',
			'address1' => 'Address 1',
			'address2' => 'Address 2',
			'city' => 'City',
			'region' => 'Region',
			'zipcode' => 'Postcode',
			'country' => 'Country',
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

		$criteria->compare('userid',$this->userid);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('country',$this->country,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AddressBook the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
