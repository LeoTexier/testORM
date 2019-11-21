<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
 * Class UserCrudFiles
 **/
class UserCrudFiles extends CRUDFiles{
	public function getViewIndex(){
		return "UserCrud/index.html";
	}

	public function getViewForm(){
		return "UserCrud/form.html";
	}

	public function getViewDisplay(){
		return "UserCrud/display.html";
	}


}
