<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;

	public function authenticate()
	{
			// authenticate from db
		$user = User::model()->findByAttributes(array('username'=>$this->username));
			if($user === null){ //เช็คUsername
				$this->errorCode = self::ERROR_USERNAME_INVALID;
			}elseif($user->password != md5($this->password)){//เช็คPassword
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			}else{ //ผ่าน
				$this->errorCode = self::ERROR_NONE;
				$this->setState('role',$user->user_type);
				$this->_id = $user->id_user;
			}
			return !$this->errorCode;

			//yii defult authenticate
	/*	$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/
	}
	public function getId(){
		return $this->_id;
	}
}