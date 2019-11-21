<?php
namespace controllers;
 use Ajax\common\html\html5\HtmlList;
 use Ajax\php\ubiquity\JsUtils;
 use Ajax\service\JArray;
 use models\Groupe;
 use Ubiquity\controllers\auth\AuthController;
 use Ubiquity\controllers\auth\WithAuthTrait;
 use Ubiquity\orm\DAO;
 use Ubiquity\utils\http\USession;

 /**
 * Controller MainController
  * @property JsUtils @jquery
  *
 **/
class MainController extends ControllerBase{
    use WithAuthTrait;

    /**
     * @get("index")
     */
	public function index(){
	    $groupes=DAO::getAll(Groupe::class,'',['organization','organization.users']);


	    $dt=$this->jquery->semantic()->dataTable('dtGroupes',Groupe::class,$groupes);
	    $dt->setFields(['name','organization','users','orgaUsers']);
	    $dt->setValueFunction('orgaUsers',function($v,$instance){

	        //return $instance->getOrganization()->getUsers();
            //return new HtmlList('',JArray::modelArray($instance->getOrganization()->getUsers()));
            $lst=new HtmlList('',JArray::modelArray($instance->getOrganization()->getUsers()));

            return $lst;
        });



	    $this->jquery->getHref('a','',['historize'=>false,'hasLoader'=> true]);
		$this->jquery->renderView('MainController/index.html');
	}

	/**
	 * @get("connect/{name}")
	 */
	public function connect($name){
	    USession::set('user', $name);
	    echo "Connexion réussie, bienvenu(e) ",$name;

    }

    /**
     * @get("exit")
     */
    public function disconnect(){
        $name=USession::get('user');
        USession::delete('user');
        echo "Déconnexion réussie, à plus",$name;

    }

    //Mise en place l'authentification
    protected function getAuthController(): AuthController
    {
        return new AuthCtrl();
    }
}
