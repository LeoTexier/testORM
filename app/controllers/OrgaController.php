<?php
namespace controllers;
 use models\Connection;
 use models\Organization;
 use Ubiquity\orm\DAO;
 use Ubiquity\utils\http\URequest;
 use Ubiquity\utils\http\UResponse;
 use Ubiquity\utils\http\USession;

 /**
 * Controller OrgaController
 **/
class OrgaController extends ControllerBase{


    /**
     * @get("orgas")
     *
     */
	public function index(){
	    $orgas =DAO::getAll(Organization::class);
		$this->loadView("OrgaController/index.html",compact('orgas'));
	}

//Fonction de validation de connexion
	public function isValid($action){
	    return USession::exists('user');
    }

    public function notValid(){
	    UResponse::setResponseCode(401);
	    echo "Connexion non autorisée !";

    }

    /**
     * @get("orgas/add")
     *
     */
	public function frmAdd(){

	    $this->loadView('OrgaController/frmAdd.html');

	}


	/**
	 *@post("orgas/add")
	**/
	public function addOrga(){
	    $orga=new Organization();
	    URequest::setPostValuesToObject($orga);
        //$orga->setDomain(URequest::post('domain'));
        //$orga->setName(URequest::post('name'));
        if(DAO::save($orga)){
            echo 'Ca marche';
        }
        else{
            echo 'MAIS C ETAIT SUR';
        }

	}

}
