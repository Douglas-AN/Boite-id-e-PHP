<?php 

class App
{
	private $fileName="app.json";
	public $TabIdea=array();
	public $TabVote=array();

	function __construct()
	{
		if(file_exists($this->fileName))
		{
			$json = file_get_contents($this->fileName);
			if(strlen($json)>1&&json_decode($json)!==null)
			{
				$obj = json_decode($json);
				foreach ($obj as $key => $value)
				{
					if(isset($this->$key))
					{
						$this->$key=$value;
					}
				}
			}
			else
			{
				file_put_contents($this->fileName, json_encode($this));
			}
		}
		else
		{
			file_put_contents($this->fileName, json_encode($this));
		}
	}

	function GetfileName()
	{
		return $this->fileName;
	}

	function addIdea($objIdea)
	{
		array_push($this->TabIdea,$objIdea);
	}

	function SaveJson()
	{
		file_put_contents($this->fileName, json_encode($this));
	}
}

Class User
{
	public $Nom="";
	public $Prenom="";
	public $Pseudo="";
    public $Mdp="";
    public $Id="";
}

Class Idea
{
	public $Title="";
	public $Text="";
	public $Image="";
    public $Date="";
}

Class Vote
{
	public $Idea=0;
	public $User="";
}


$App = new App("app.json");


// $objIdea = new Idea();
// $objIdea->Title="Idea 1";
// $objIdea->Text="Idea text 1";
// $objIdea->Image="";

// $App->addIdea($objIdea);

// $App->SaveJson();

// $objIdea = new Idea();
// $objIdea->Title="Idea 2";
// $objIdea->Text="Idea text 2";
// $objIdea->Image="";

// $App->addIdea($objIdea);

// $App->SaveJson();

// $json = file_get_contents($App->GetfileName());


// var_dump(json_decode($json));