<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 23/10/2017
 * Time: 10:31
 */

require_once File::build_path(array('model','Model.php'));

class ModelUser extends Model
{

    protected static $object = 'User';
    protected static $primary = 'idUser';

    private $idUser;
    private $mailUser;
    private $passwordUser;
    private $activated;

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getMailUser()
    {
        return $this->mailUser;
    }

    /**
     * @param mixed $mailUser
     */
    public function setMailUser($mailUser)
    {
        $this->mailUser = $mailUser;
    }

    /**
     * @return mixed
     */
    public function getPasswordUser()
    {
        return $this->passwordUser;
    }

    /**
     * @param mixed $passwordUser
     */
    public function setPasswordUser($passwordUser)
    {
        $this->passwordUser = $passwordUser;
    }

    /**
     * @return mixed
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * @param mixed $activated
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
    }

    public function __construct($id=null,$mail=null,$password=null)
    {
        if (!is_null($id) && !is_null($mail) && !is_null($password)) {
            $this->idUser = $id;
            $this->mailUser = $mail;
            $this->passwordUser = $password; //TODO crypter mdp
        }
    }

}