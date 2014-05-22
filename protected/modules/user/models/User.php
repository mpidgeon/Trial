<?php

class User extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANNED=-1;
	
	//TODO: Delete for next version (backward compatibility)
	const STATUS_BANED=-1;
	
	/**
	* This is the model class for table "tbl_user".
	*
	* The following are the available columns in table 'tbl_user':
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
	* The following are the available model relations:
	* @property AddressBook[] $addressBooks
	* @property TaxJurisdiction $taxJurisdiction
	*/

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->getModule('user')->tableUsers;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Incorrect username (length from 3 to 20 characters).")),
			array('firstname, lastname', 'length', 'max'=>50, 'min' => 2,'message' => UserModule::t("Length must be between 2 and 50 characters).")),
			array('password', 'length', 'max'=>64, 'min' => 4,'message' => UserModule::t("Incorrect password (minimum length is 4 symbols).")),
			array('email', 'length', 'max'=>128),
			array('title', 'length', 'max'=>8),
			array('company', 'length', 'max'=>64),
			array('primaryAddressTag', 'length', 'max'=>16),
			array('activkey', 'length', 'max'=>32),
			array('phonenumber, mobilenumber', 'length', 'max'=>20),
			array('username', 'unique', 'message' => UserModule::t("This username already exists.")),
			array('email', 'unique', 'message' => UserModule::t("This user's email address already exists.")),
			array('username, firstname, lastname', 'match', 'pattern' => "/^[-A-Za-z0-9_'\s]+$/u",'message' => UserModule::t("Incorrect symbols (-,A-z,0-9,_,',space).")),
			array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANNED)),
            array('create_at', 'default', 'value' => date('Y-m-d H:i:s'), 'setOnEmpty' => true, 'on' => 'insert'),
            array('lastvisit_at', 'default', 'value' => '0000-00-00 00:00:00', 'setOnEmpty' => true, 'on' => 'insert'),
			array('username, firstname, lastname, email, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
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
        return array(
			'addressBooks' => array(self::HAS_MANY, 'addressbook', 'userid'),
			'taxJurisdiction' => array(self::HAS_ONE, 'taxjurisdiction', 'userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => UserModule::t("Id"),
			'username'=>UserModule::t("Username"),
			'title' => 'Title',
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'dateofbirth' => 'Date of birth',
			'company' => 'Company',
			'password'=>UserModule::t("Password"),
			'primaryAddressTag' => 'Primary Address Tag',
			'verifyPassword'=>UserModule::t("Retype Password"),
			'email'=>UserModule::t("E-mail"),
			'profile' => UserModule::t('Profile'),
			'verifyCode'=>UserModule::t("Verification Code"),
			'phonenumber' => 'Phonenumber',
			'mobilenumber' => 'Mobilenumber',
			'activkey' => UserModule::t("activation key"),
			'createtime' => UserModule::t("Registration date"),
			'create_at' => UserModule::t("Registration date"),
			'lastvisit_at' => UserModule::t("Last visit"),
			'status' => UserModule::t("Status"),
		);
	}
	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACTIVE,
            ),
            'notactive'=>array(
                'condition'=>'status='.self::STATUS_NOACTIVE,
            ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_BANNED,
            ),
            'notsafe'=>array(
            	'select' => 'id, username, password, email, activkey, create_at, lastvisit_at, status',
            ),
        );
    }
	
	public function defaultScope()
    {
        return CMap::mergeArray(Yii::app()->getModule('user')->defaultScope,array(
            'alias'=>'user',
            'select' => 'user.id, user.username, user.firstname, user.lastname, user.email, user.create_at, user.lastvisit_at, user.status',
        ));
    }
	
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				self::STATUS_NOACTIVE => UserModule::t('Not active'),
				self::STATUS_ACTIVE => UserModule::t('Active'),
				self::STATUS_BANNED => UserModule::t('Disabled'),
			),
			'AdminStatus' => array(
				'0' => UserModule::t('No'),
				'1' => UserModule::t('Yes'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
	
	public static function getRole($id) 
	{
        $role = Yii::app()->db->createCommand()
                ->select('itemname')
                ->from('AuthAssignment')
                //->where('userid=:id', array(':id'=>$this->id))
				->where('userid=:id', array(':id'=>$id))
                ->queryScalar();
				
        return $role;
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
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.	
		$criteria=new CDbCriteria;
        
        $criteria->compare('id',$this->id);
        $criteria->compare('username',$this->username,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('dateofbirth',$this->dateofbirth,true);
        $criteria->compare('password',$this->password);
        $criteria->compare('email',$this->email,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('primaryAddressTag',$this->primaryAddressTag,true);
		$criteria->compare('phonenumber',$this->phonenumber,true);
		$criteria->compare('mobilenumber',$this->mobilenumber,true);
        $criteria->compare('activkey',$this->activkey);
        $criteria->compare('create_at',$this->create_at);
        $criteria->compare('lastvisit_at',$this->lastvisit_at);
        $criteria->compare('status',$this->status);

		if($merge!==null)
			$criteria->mergeWith($merge);
		
        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        	'pagination'=>array(
				'pageSize'=>Yii::app()->getModule('user')->user_page_size,
			),
        ));
    }

    public function getCreatetime() {
        return strtotime($this->create_at);
    }

    public function setCreatetime($value) {
        $this->create_at=date('Y-m-d H:i:s',$value);
    }

    public function getLastvisit() {
        return strtotime($this->lastvisit_at);
    }

    public function setLastvisit($value) {
        $this->lastvisit_at=date('Y-m-d H:i:s',$value);
    }
}