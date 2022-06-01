<?php

class App
{
	private $fileName = "app.json";
	public $TabIdea = array();
	public $TabUser = array();

	function __construct()
	{
		if (file_exists($this->fileName)) {
			$json = file_get_contents($this->fileName);
			if (strlen($json) > 1 && json_decode($json) !== null) {
				$obj = json_decode($json);
				foreach ($obj as $key => $value) {
					if (isset($this->$key)) {
						$this->$key = $value;
					}
				}
			} else {
				file_put_contents($this->fileName, json_encode($this));
			}
		} else {
			file_put_contents($this->fileName, json_encode($this));
		}
	}

	function GetfileName()
	{
		return $this->fileName;
	}

	function addIdea($objIdea)
	{
		array_push($this->TabIdea, $objIdea);
	}

	function addUser($objUser)
	{
		array_push($this->TabUser, $objUser);
	}

	function SaveJson()
	{
		file_put_contents($this->fileName, json_encode($this));
	}
}

class User
{
	public $Nom = "";
	public $Prenom = "";
	public $Pseudo = "";
	public $Mdp = "";
	public $Id = "";
}

class Idea
{
	public $Title = "";
	public $Text = "";
	public $Image = "";
	public $Date = "";
	public $UserVote = array();
}

$App = new App("app.json");

// $json = file_get_contents($App->GetfileName());
// var_dump(json_decode($json));