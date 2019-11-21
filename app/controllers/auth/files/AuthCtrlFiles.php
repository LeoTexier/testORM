<?php
namespace controllers\auth\files;

use Ubiquity\controllers\auth\AuthFiles;
 /**
 * Class AuthCtrlFiles
 **/
class AuthCtrlFiles extends AuthFiles{
	public function getViewIndex(){
		return "AuthCtrl/index.html";
	}

	public function getViewInfo(){
		return "AuthCtrl/info.html";
	}

	public function getViewNoAccess(){
		return "AuthCtrl/noAccess.html";
	}

	public function getViewDisconnected(){
		return "AuthCtrl/disconnected.html";
	}

	public function getViewMessage(){
		return "AuthCtrl/message.html";
	}

	public function getViewBaseTemplate(){
		return "AuthCtrl/baseTemplate.html";
	}


}
