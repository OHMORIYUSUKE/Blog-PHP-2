<?php

//基本クラスの定義
class Customer
{
	protected $name = "";
	protected $age = 18;

	function __construct($na, $ag)
	{
		$this->name = $na;

		if ($ag >= 18 && $ag <= 65) {
			$this->age = $ag;
		} else {
			$this->age = -1;
		}
	}
	function getName()
	{
		return $this->name;
	}
	function getAge()
	{
		return $this->age;
	}
}

//派生クラスの定義
class User extends Customer
{
	private $adr = "";
	private $tel = "";

	function __construct($na, $ag, $ad, $te)
	{

		parent::__construct($na, $ag);
		$this->adr = $ad;
		$this->tel = $te;
	}

	function getName()
	{
		return "名前：" . $this->name;
	}
	function getAdr()
	{
		return $this->adr;
	}
	function getTel()
	{
		return $this->tel;
	}
}



function PrintFunc($user)
{
	echo $user->getName();
	echo "<br>";
	echo $user->getAge();
	echo "<br>";
	echo $user->getAdr();
	echo "<br>";
	echo $user->getTel();
	echo "<br>";
}
