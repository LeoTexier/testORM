<?php
namespace models;
/**
 * @table('groupe')
*/
class Groupe{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"name","nullable"=>true,"dbType"=>"varchar(65)")
	 * @validator("length","constraints"=>array("max"=>65))
	**/
	private $name;

	/**
	 * @column("name"=>"email","nullable"=>true,"dbType"=>"varchar(255)")
	 * @validator("email")
	 * @validator("length","constraints"=>array("max"=>255))
	**/
	private $email;

	/**
	 * @column("name"=>"aliases","nullable"=>true,"dbType"=>"mediumtext")
	**/
	private $aliases;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Organization","name"=>"idOrganization","nullable"=>false)
	**/
	private $organization;

	/**
	 * @manyToMany("targetEntity"=>"models\\User","inversedBy"=>"groupes")
	 * @joinTable("name"=>"groupeusers")
	**/
	private $users;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getName(){
		return $this->name;
	}

	 public function setName($name){
		$this->name=$name;
	}

	 public function getEmail(){
		return $this->email;
	}

	 public function setEmail($email){
		$this->email=$email;
	}

	 public function getAliases(){
		return $this->aliases;
	}

	 public function setAliases($aliases){
		$this->aliases=$aliases;
	}

	 public function getOrganization(){
		return $this->organization;
	}

	 public function setOrganization($organization){
		$this->organization=$organization;
	}

	 public function getUsers(){
		return $this->users;
	}

	 public function setUsers($users){
		$this->users=$users;
	}

	 public function __toString(){
		return $this->id;
	}

}