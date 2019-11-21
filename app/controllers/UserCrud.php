<?php
namespace controllers;
use controllers\crud\datas\UserCrudDatas;
use Ubiquity\controllers\crud\CRUDDatas;
use controllers\crud\viewers\UserCrudViewer;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use controllers\crud\events\UserCrudEvents;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\UserCrudFiles;
use Ubiquity\controllers\crud\CRUDFiles;

 /**
 * CRUD Controller UserCrud
 * @route("/users","inherited"=>true,"automated"=>true)
 **/
class UserCrud extends \Ubiquity\controllers\crud\CRUDController{

	public function __construct(){
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model="models\\User";
	}

	public function _getBaseRoute() {
		return '/users';
	}
	
	protected function getAdminData(): CRUDDatas{
		return new UserCrudDatas($this);
	}

	protected function getModelViewer(): ModelViewer{
		return new UserCrudViewer($this);
	}

	protected function getEvents(): CRUDEvents{
		return new UserCrudEvents($this);
	}

	protected function getFiles(): CRUDFiles{
		return new UserCrudFiles();
	}


}
