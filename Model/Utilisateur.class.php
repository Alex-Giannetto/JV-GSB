<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 20/11/2017
 * Time: 14:13
 */
class Utilisateur
{
	protected $num, $prenom, $mail, $password;

	/**
	 * Utilisateur constructor.
	 * @param $num
	 * @param $prenom
	 * @param $mail
	 * @param $password
	 */
	public function Utilisateur($num, $prenom, $mail, $password)
	{
		$this->setNum($num);
		$this->setPrenom($prenom);
		$this->setMail($mail);
		$this->setPassword($password);
	}

	/**
	 * Utilisateur constructor.
	 */
	public function __construct()
	{
	}


	/**
	 * @return mixed
	 */
	public function getNum()
	{
		return $this->num;
	}

	/**
	 * @param mixed $num
	 */
	public function setNum($num)
	{
		$this->num = $num;
	}

	/**
	 * @return mixed
	 */
	public function getPrenom()
	{
		return $this->prenom;
	}

	/**
	 * @param mixed $prenom
	 */
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	}

	/**
	 * @return mixed
	 */
	public function getMail()
	{
		return $this->mail;
	}

	/**
	 * @param mixed $mail
	 */
	public function setMail($mail)
	{
		$this->mail = $mail;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}




}