<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 20/11/2017
 * Time: 14:13
 */
class Utilisateur
{
	protected $num, $nom, $prenom, $mail, $password, $role;

	/**
	 * Utilisateur constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * @return mixed
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * @param mixed $nom
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	/**
	 * @return mixed
	 */
	public function getRole()
	{
		return $this->role;
	}

	/**
	 * @param mixed $role
	 */
	public function setRole($role)
	{
		$this->role = $role;
	}

	/**
	 * @return mixed
	 */
	public function getNum()
	{
		return (int)$this->num;
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
