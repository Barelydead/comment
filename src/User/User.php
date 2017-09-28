<?php
namespace CJ\User;

use \Anax\Database\ActiveRecordModel;

/**
 * A database driven model.
 */
class User extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "User";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $mail;
    public $password;
    public $created;
    public $updated;
    public $deleted;
    public $active;


    /**
    * Creating $session var for inject
    */
    private $session;

    /**
    *   Init the class with session and database
    */
    public function init($db, $session)
    {
        $this->session = $session;
        $this->setDb($db);
    }

    /**
     * Set the password.
     *
     * @param string $password the password to use.
     *
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


    /**
     * Verify the acronym and the password, if successful the object contains
     * all details from the database row.
     *
     * @param string $acronym  acronym to check.
     * @param string $password the password to use.
     *
     * @return boolean true if acronym and password matches, else false.
     */
    public function verifyPassword($mail, $password)
    {
        $this->find("mail", $mail);
        return password_verify($password, $this->password);
    }

    /*
    * Get all users.
    */
    public function getAllUsers()
    {
        return $this->findAll();
    }


    /*
    * Get all users.
    */
    public function deleteUser($id)
    {
        $this->user->find("id", $id);
        $this->user->delete();
    }


    /*
    * Get a user based on ID
    */
    public function getUser($id)
    {
        return $this->find("id", $id);
    }

    /*
    * Get a user based on ID
    */
    public function isLoggedIn()
    {
        return $this->session->has("user");
    }


    /*
    * Get a user based on ID
    */
    public function getLoggedInUserId()
    {
        return $this->session->get("user");
    }


    /*
    * Get logged in user
    * @return user class
    */
    public function getLoggedInUser()
    {
        if ($this->session->has("user")) {
            return $this->find("id", $this->session->get("user"));
        }
    }


    public function getUserImg($mail, $classes = "", $size = 125)
    {
        $hash = md5($mail);

        $html = "<img src='https://www.gravatar.com/avatar/$hash?s=$size&default=mm' class='$classes'>";
        return $html;
    }


    /*
    * Return true is user is admin
    */
    public function isUserAdmin()
    {
        if ($this->isLoggedIn()) {
            $id = $this->getLoggedInUserId();

            $this->find("id", $id);
            if ($this->userType == "admin") {
                return true;
            }
        }

        return false;
    }
}
