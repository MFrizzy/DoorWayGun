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

    private $nomUser;
    private $prenomUser;
    private $adresseUser;
    private $nomVille;
    private $codePostal;
    private $idUser;
    private $mailUser;
    private $passwordUser;
    private $activated;
    private $admin;
    private $nonce;

    public static function activate($idUser) {
        try{
            $sql='update '.static::$object.' set activated=1 Where idUser=:idUser';
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "idUser" => $idUser
            );
            $req_prep->execute($values);
            return true;
        }
        catch (Exception $e) { return false; }
    }

    /**
     * @return mixed
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @return mixed
     */
    public function getNomUser()
    {
        return $this->nomUser;
    }

    /**
     * @param mixed $nomUser
     */
    public function setNomUser($nomUser)
    {
        $this->nomUser = $nomUser;
    }

    /**
     * @return mixed
     */
    public function getPrenomUser()
    {
        return $this->prenomUser;
    }

    /**
     * @param mixed $prenomUser
     */
    public function setPrenomUser($prenomUser)
    {
        $this->prenomUser = $prenomUser;
    }

    /**
     * @return mixed
     */
    public function getAdresseUser()
    {
        return $this->adresseUser;
    }

    /**
     * @param mixed $adresseUser
     */
    public function setAdresseUser($adresseUser)
    {
        $this->adresseUser = $adresseUser;
    }

    /**
     * @return mixed
     */
    public function getNomVille()
    {
        return $this->nomVille;
    }

    /**
     * @param mixed $nomVille
     */
    public function setNomVille($nomVille)
    {
        $this->nomVille = $nomVille;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

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
            $this->passwordUser = $password;
        }
    }

    public static function checkPassword($login, $mot_de_passe_chiffre) {
        $user=ModelUser::selectByMail($login);
        if(!$user) return false;
        if($user->getPasswordUser()==$mot_de_passe_chiffre)
        {
            return true;
        }
        else return false;
    }

    public static function selectByMail($mail) {

        try {
            $sql='SELECT * FROM '.static::$object.' WHERE mailUser=:mail';
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "mail" => $mail
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$object));
            $tab = $req_prep->fetchAll();
            if (empty($tab)) return false;
            return $tab[0];
        }
        catch (Exception $e) {return false;}
    }

    public static function exist($primary) {
        try {
            $sql='select count(*) from User where idUser='.$primary;
            $rep=Model::$pdo->prepare($sql);
            $rep->execute();
            $donnee=$rep->fetchAll(PDO::FETCH_ASSOC);
            $retourne=$donnee[0];
            return (int)$retourne["count(*)"];
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public static function setAdmin($idUser){
        try {
            ModelUser::activate($idUser);
            $sql='UPDATE User SET admin=1 WHERE idUser=:idUser';
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "idUser" => $idUser
            );
            $req_prep->execute($values);
            return true;
        }
        catch (Exception $e) {return false;}
    }

}