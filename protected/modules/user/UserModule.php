<?php
/**
 * Yii-User module
 * 
 * @author Mikhail Mangushev <mishamx@gmail.com> 
 * @link http://yii-user.2mx.org/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @version $Id: UserModule.php 132 2011-10-30 10:45:01Z mishamx $
 */

class UserModule extends CWebModule
{
	/**
	 * @var int
	 * @desc items on page
	 */
	public $user_page_size = 10;
	
	/**
	 * @var int
	 * @desc items on page
	 */
	public $fields_page_size = 10;
	
	/**
	 * @var boolean
	 * @desc use email for activation user account
	 */
	public $sendActivationMail=true;
	
	/**
	 * @var boolean
	 * @desc allow auth for is not active user
	 */
	public $loginNotActiv=false;
	
	/**
	 * @var boolean
	 * @desc activate user on registration (only $sendActivationMail = false)
	 */
	public $activeAfterRegister=false;
	
	/**
	 * @var boolean
	 * @desc login after registration (need loginNotActiv or activeAfterRegister = true)
	 */
	public $autoLogin=true;
	
	public $registrationUrl = array("/user/registration");
	public $recoveryUrl 	= array("/user/recovery/recovery");
	public $loginUrl 		= array("/user/login");
	public $logoutUrl 		= array("/user/logout");
	public $profileUrl 		= array("/user/profile");
	public $returnUrl 		= array("/user/profile");
	public $returnLogoutUrl = array("/user/login");
	public $adminUrl        = array("/user/admin");
	
	
	/**
	 * @var int
	 * @desc Remember Me Time (seconds), defalt = 2592000 (30 days)
	 */
	public $rememberMeTime = 2592000; // 30 days
	
	public $fieldsMessage = '';
	
	/**
	 * @var array
	 * @desc User model relation from other models
	 * @see http://www.yiiframework.com/doc/guide/database.arr
	 */
	public $relations = array();
	
	/**
	 * @var boolean
	 */
	public $captcha = array('registration'=>true);
	
	/**
	 * @var boolean
	 */
	//public $cacheEnable = false;
	
	public $tableUsers = '{{user}}';

    public $defaultScope = array(
    );
	
	static private $_user;
	static private $_users=array();
	static private $_userByName=array();
	static private $_admin;
	static private $_admins;
	
	/**
	 * @var array
	 * @desc Behaviors for models
	 */
	public $componentBehaviors=array();
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'user.models.*',
			'user.components.*',
		));
		
		$this->layoutPath = Yii::getPathOfAlias('user.views.layouts');
		$this->layout = 'main';
	}
	
	public function getBehaviorsFor($componentName){
        if (isset($this->componentBehaviors[$componentName])) {
            return $this->componentBehaviors[$componentName];
        } else {
            return array();
        }
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	/**
	 * @param $str
	 * @param $params
	 * @param $dic
	 * @return string
	 */
	public static function t($str='',$params=array(),$dic='user') {
		if (Yii::t("UserModule", $str)==$str)
		    return Yii::t("UserModule.".$dic, $str, $params);
        else
            return Yii::t("UserModule", $str, $params);
	}
	
	/**
	 * @return hash string. Ok for activkey
	 */
	public static function badHasher($string="") {
		return md5($string);
	}

	/**
	 * @return hash string.
	 */
	public static function hasher($string="") {
		return CPasswordHelper::hashPassword($string);
	}
	
	/**
	 * @return bool.
	 */
	public static function checkPassword($password, $hash) {
		return CPasswordHelper::verifyPassword($password, $hash);
	}
	
	/**
	 * @param $place
	 * @return boolean 
	 */
	public static function doCaptcha($place = '') {
		if(!extension_loaded('gd'))
			return false;
		if (in_array($place, Yii::app()->getModule('user')->captcha))
			return Yii::app()->getModule('user')->captcha[$place];
		return false;
	}
	
	/**
	 * Return admin status.
	 * @return boolean
	 */
	public static function isAdmin() {
		if(Yii::app()->user->isGuest)
			return false;
		else {
			if (!isset(self::$_admin)) {
				if(Yii::app()->user->getIsAdmin()){
					self::$_admin = true;
				} else {
					self::$_admin = false;	
				}
			}
			return self::$_admin;
		}
	}

	/**
	 * Return admins.
	 * @return array superusers names
	 */	
	public static function getAdmins(){
		return self::$_admins;
	}
	
	/**
	 * Send mail method
	 */
	public static function sendMail($email,$subject,$message) {
    	$adminEmail = Yii::app()->params['adminEmail'];
	    $headers = "MIME-Version: 1.0\r\nFrom: $adminEmail\r\nReply-To: $adminEmail\r\nContent-Type: text/html; charset=utf-8";
	    $message = wordwrap($message, 70);
	    $message = str_replace("\n.", "\n..", $message);
	    return mail($email,'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers);
	}
	
	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public static function user($id=0,$clearCache=false) {
        if (!$id&&!Yii::app()->user->isGuest)
            $id = Yii::app()->user->id;
		if ($id) {
            if (!isset(self::$_users[$id])||$clearCache)
                self::$_users[$id] = User::model()->findbyPk($id);
			return self::$_users[$id];
        } else return false;
	}
	
	/**
	 * Return safe user data.
	 * @param user name
	 * @return user object or false
	 */
	public static function getUserByName($username) {
		if (!isset(self::$_userByName[$username])) {
			$_userByName[$username] = User::model()->findByAttributes(array('username'=>$username));
		}
		return $_userByName[$username];
	}
	
	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public function users() {
		return User;
	}
	
	// Return dashboard url based on Role
	public function getRoleUrl()
	{
		$role = User::getRole(Yii::app()->user->id);
		
		if($role=='Administrator'){
			$returnUrl = Yii::app()->getModule('user')->adminUrl;}
		if($role=='RoamPAAdmin'){
			$returnUrl = Yii::app()->getModule('user')->returnUrl;}
		if($role=='RoamPAUser'){
			$returnUrl = Yii::app()->getModule('user')->returnUrl;}
		if($role=='CompanyAdmin'){
			$returnUrl = Yii::app()->getModule('user')->returnUrl;}
		if($role=='CompanyUser'){
			$returnUrl = Yii::app()->getModule('user')->returnUrl;}
		if($role=='ServiceProviderAdmin'){
			$returnUrl = Yii::app()->getModule('user')->returnUrl;}
		if($role=='ServiceProviderUser'){
			$returnUrl = Yii::app()->getModule('user')->returnUrl;}
		if($role=='User'){
			$returnUrl = Yii::app()->getModule('user')->returnUrl;}
			
		return $returnUrl;
	}
}
