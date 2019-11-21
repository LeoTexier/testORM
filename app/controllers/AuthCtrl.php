<?php
namespace controllers;
use models\User;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;
use controllers\auth\files\AuthCtrlFiles;
use Ubiquity\controllers\auth\AuthFiles;

 /**
 * Auth Controller AuthCtrl
 **/
class AuthCtrl extends \Ubiquity\controllers\auth\AuthController{

	protected function onConnect($connected) {
		$urlParts=$this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if(isset($urlParts)){
			$this->_forward(implode("/",$urlParts));
		}else{
			//TODO
			//Forwarding to the default controller/action
		}
	}

	protected function _connect() {
		if(URequest::isPost()){
			$email=URequest::post($this->_getLoginInputName());
			$password=URequest::post($this->_getPasswordInputName());
			$user=DAO::getOne(User::class, "email= ?",false,[$email]);
			if($user->getPassword()==$password){

			    return super;
            }
		}
		return;
	}

    public function _getUserSessionKey(){
        return "user";
    }

	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
	 */
	public function _isValidUser($action=null) {
		return USession::exists($this->_getUserSessionKey());
	}

	public function _getBaseRoute() {
		return 'AuthCtrl';
	}
	
	protected function getFiles(): AuthFiles{
		return new AuthCtrlFiles();
	}



}
